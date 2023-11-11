<?php

namespace App\Http\Controllers;

use Session;
use App\AppConstants;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email_or_customer_code' => 'required|string',
            'password' => 'required|string'
        ]);

        $is_employee = false;

        // Check if is email
        if (filter_var($request->email_or_customer_code, FILTER_VALIDATE_EMAIL)) {
            $is_employee = true;
        }

        if ($is_employee) {
            $authenticated = auth()->attempt([
                'email' => $request->email_or_customer_code,
                'password' => $request->password
            ]);

            if ($authenticated) {
                return redirect(route('home'));
            }

            return back()->withErrors([ 'login_error' => 'Claves de acceso incorrectas.' ])->onlyInput('email');

        } else {
            $request_result = $this->sendHttpRequest(
                AppConstants::CUSTOMERS_API_LOGIN,
                AppConstants::HTTP_POST,
                [
                    'customer_code' => $request->email_or_customer_code,
                    'password'      => $request->password
                ]
            );

            if (!empty($request_result['error'])) {
                return back()->withErrors([ 'login_error' => 'Claves de acceso incorrectas.' ])->onlyInput('email');
            }

            return redirect(route('welcome'))->with(['access_token' => $request_result['access_token']]);
        }

    }

    public function admin_logout(Request $request) {
        if (Auth::check()) {
            Auth::logout();
            Session:flush();
        }

        return redirect()->back();
    }

    public function logout(Request $request) {
        return redirect(route('login'));
    }
}

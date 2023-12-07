<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\AppConstants;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CustomersAuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'customer_code' => 'required|string',
            'password'      => 'required|string'
        ]);

        $request_result = $this->sendHttpRequest(
            AppConstants::CUSTOMERS_API_LOGIN,
            "",
            AppConstants::HTTP_POST,
            [
                'customer_code' => $request->customer_code,
                'password'      => $request->password
            ]
        );

        if (!empty($request_result['error'])) {
            return back()->withErrors([ 'login_error' => 'Claves de acceso incorrectas.' ])->onlyInput('email');
        }

        Customer::updateOrCreate(
            [ 'customer_code' => $request->customer_code ],
            [ 'access_token'  => $request_result['access_token'] ]
        );

        return redirect(route('customers.welcome'))->withCookie(
            'access_token',
            $request_result['access_token'],
            120
        );
    }

    public function logout(Request $request) {
        $this->sendHttpRequest(
            AppConstants::CUSTOMERS_API_LOGOUT,
            $request->cookie('access_token'),
            AppConstants::HTTP_POST,
            []
        );

        Cookie::expire('access_token');

        // Replace cookie with empty new cookie and expires in 1 second, this will force logout on customers side
        return redirect()->back();
    }
}

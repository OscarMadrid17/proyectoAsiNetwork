<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\AppConstants;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'     => 'required|string',
            'password'  => 'required|string'
        ]);

        $authenticated = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($authenticated) {
            return redirect(route('admin.home'));
        }

        return back()->withErrors([ 'login_error' => 'Claves de acceso incorrectas.' ])->onlyInput('email');
    }

    public function logout(Request $request) {
        if (Auth::check()) {
            Auth::logout();
            Session:flush();
        }

        return redirect()->back();
    }
}

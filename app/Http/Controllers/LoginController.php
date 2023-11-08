<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function logout(Request $request) {
        if (Auth::check()) {
            Auth::logout();
            Session:flush();
        }

        return redirect()->back();
    }

    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();

//        if(!Auth::validate($credentials)){
//             return redirect()->to('/login')->withErrors('auth.failed');
//        }

        if ($request->is_customer) {
            $response = Http::post('http://10.200.248.122/api/v1/auth/login', $credentials);

            return $response;
            // if ($response->ok()) {
            //     return redirect(route('home'))->with([ 'token', $response['token'] ]);
            // } else {
            //     return $response;
            // }

        } else {
            $authenticated = auth()->attempt($credentials);

            if ($authenticated) {
                return redirect(route('home'));
            }

            return back()->onlyInput('email');
        }
        // $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // Auth::login($user);

        // return $this->authenticated($request,$user);

    }

    public function authenticated(Request $request, $user){
            return view('home.index');
    }
}

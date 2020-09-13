<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Hash;
use App\Admin;

class LoginController extends Controller
{
    public function login(Request $request) {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = Admin::where("email", request('email'))->first();

        if(!isset($user)){
            return response([
                'error' => true,
                'message' => "Admin Not found",
            ]);
        }

        if (!Hash::check(request('password'), $user->password)) {
            return "Incorrect password";
            return response([
                'error' => true,
                'message' => "Incorrect password",
            ]);
        } 

        $tokenResult = $user->createToken('Admin');

        $user->access_token = $tokenResult->accessToken;
        $user->token_type = 'Bearer';

        return $user;
    }

    public function getAdmin() {
        return response([
            'user' => Auth::user(),
        ]);
    }
}

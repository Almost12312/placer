<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthorizationController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->get('login');
        $password = $request->get('password');

        $credentials = [
            'email' => $login,
            'password' => $password
        ];

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            $user = Auth::user();

            return response()->json([
                'success' => true,
                'redirect' => route($user->is_admin ? 'dashboard' : 'cabinet')
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }


    }
}

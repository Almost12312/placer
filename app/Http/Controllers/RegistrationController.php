<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function reg(Request $request)
    {
        $name = $request->get('name');
        $age = $request->get('age');
        $email = $request->get('email');
        $password = $request->get('password');
        $phone = $request->get('phone');

        $createUser = User::create([
            'name' => $name,
            'age' => $age,
            'favorite' => json_encode([

            ]),
            'email' => $email,
            'password' => Hash::make($password),
            'phone' => $phone,
            'is_admin' => false
        ]);

        $credentials = [
            'email' => $email,
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

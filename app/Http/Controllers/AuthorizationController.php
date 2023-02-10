<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Database\User\UserChanges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'redirect' => route('authorization')
        ]);
    }

    public function reg(Request $request)
    {
        $name = $request->get('name');
        $lastname = $request->get('lastname');
        $middlename = $request->get('middlename');
        $age = $request->get('age');
        $email = $request->get('email');
        $password = $request->get('password');
        $phone = $request->get('phone');
        $city = $request->get('city');
        $imagesId = $request->get('id');

        $createUser = User::create([
            'name' => $name,
            'lastname' => $lastname,
            'middlename' => $middlename,
            'age' => $age,
            'favorite' => json_encode([

            ]),
            'email' => $email,
            'password' => Hash::make($password),
            'phone' => $phone,
            'city' => $city,
        ]);

        if ($imagesId !== null)
        {
            $createUser->file()->sync($imagesId);
        }

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

    public function changeInfo(Request $request)
    {

        $data = [
            'name' => $request->get('name'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'city' => $request->get('city'),
        ];

        return UserChanges::changeInfo($data);
    }
}

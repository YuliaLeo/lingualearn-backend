<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => 'Email and Password do not match'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'message' => null,
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/public/login');
    }
}

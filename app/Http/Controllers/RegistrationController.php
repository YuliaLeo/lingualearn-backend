<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Models\UserLanguageLevels;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->userName,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        UserLanguageLevels::create([
            'user_id' => $user->id,
            'language_id' => $request->language_id,
            'level_id' => $request->level_id,
        ]);

        return new JsonResponse([
            'message' => 'User created successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 201);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\DefaultResource;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);

            return response(new DefaultResource(true, 'User registered successfully.', $user), 201);
        } catch (\Throwable $th) {
            return response(new DefaultResource(false, $th->getMessage(), null), 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();

            if (!auth()->attempt($credentials)) {
                return response(new DefaultResource(false, 'Invalid credentials.', null), 401);
            }

            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response(new DefaultResource(true, 'Login successful.', [
                'user' => $user,
                'token' => $token,
            ]), 200);
        } catch (\Throwable $th) {
            return response(new DefaultResource(false, $th->getMessage(), null), 500);
        }
    }

    public function logout()
    {
        try {
            auth()->user()->tokens()->delete();
//            auth()->user()->currentAccessToken()->delete();

            return response(new DefaultResource(true, 'Logout successful.', null), 200);
        } catch (\Throwable $th) {
            return response(new DefaultResource(false, $th->getMessage(), null), 500);
        }
    }
}

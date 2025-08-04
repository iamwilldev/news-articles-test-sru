<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index_register()
    {
        return view('auth.register');
    }

    public function index_login()
    {
        return view('auth.login');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
            Auth::login($user);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();

            if (!Auth::attempt($credentials)) {
                return back()->withErrors(['email' => 'Invalid credentials.']);
            }

            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            return redirect()->route('login');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}

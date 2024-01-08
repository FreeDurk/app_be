<?php

namespace App\Http\Controllers;

use App\Http\ApiResponse\ApiResponse;
use App\Http\Requests\AccountRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $tokenData = [
            'access_token' => $token,
            'token_type' => 'bearer',
        ];

        return ApiResponse::success($tokenData, 'Authenticated Successfully.');
    }

    public function register(AccountRegistrationRequest $request)
    {
        $post = $request->validated();

        $user = User::insert([
            'firstname' => $post['firstname'],
            'lastname' => $post['lastname'],
            'email' => $post['email'],
            'password' => bcrypt($post['password'])
        ]);

        return ApiResponse::success($user, 'Account created successfully.');
    }

    public function logout()
    {
        auth()->logout(true);
        return ApiResponse::success('', 'Successfully logged out');
    }
}

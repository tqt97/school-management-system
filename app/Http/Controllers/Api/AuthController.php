<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    public function login(LoginRequest $request)
    {
        $request->validated($request->all());
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Unauthorized', 401);
        }
        $user = User::firstWhere('email', $request->email);
        // $token = $user->createToken('API for ' . $user->email)->plainTextToken;
        $token = $user->createToken(
            'API for ' . $user->email,
            ['*'],
            now()->addDay()
        )
            ->plainTextToken;
        return $this->ok('Authenticated', ['token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->ok('Logged out');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $validatedUser = $request->validated();
        $email = $validatedUser['email'];

        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($validatedUser['password'], $user->password)) {
            return response()->json([
                'message' => "login fail.",
            ], 400);
        }

        Auth::login($user);

        $token = $user->createToken('api_token')->plainTextToken;

        $user->makeVisible('password');
        // $permissions = $user->getAllPermissions()->unique('id')->values();

        return response()->json([
            'user' => $user,
            // 'permissions' => $permissions,
            'token' => $token,
            'message' => 'login_success'
        ], 200);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return $this->errorResponse('User  not authenticated', 401);
        }
    
        $user->tokens()->delete();
        
        return $this->successResponse('logout_success');
    }

}

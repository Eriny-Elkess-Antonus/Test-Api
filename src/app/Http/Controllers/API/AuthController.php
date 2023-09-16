<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;


use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\API\BaseController;

class AuthController extends BaseController
{
    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->sendError(message: 'Invalid credentials', status_code: 401);
        }
        if (!config('custom.enable_multiple_logins')) {
            $user->tokens()->delete();
        }
        $token = $user->createToken('authToken')->plainTextToken;
        return $this->sendResponse([
            'token' => $token,
            'user'  => new UserResource($user)
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

       // $token = $user->createToken('auth_token')->plainTextToken;

       return $this->sendResponse(message:'now u can login');
    }


    public function logout(Request $request )
    {
        /** @var User $user */
        $user = auth('sanctum')->user();
       
        $user->currentAccessToken()->delete();
       
       // $request->user()->currentAccessToken()->delete();
      
        return $this->sendResponse(message:'logout successful');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
    * Register a new user
    * 
    * This method is used to register a new user.
    * @param  \Illuminate\Http\Request  $request
    * @param Request $request
    */    
    public function registerUser(User $user, Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
      
        $token = $user->createToken('API Token')->plainTextToken;
        $user->token = $token;
        
        return new UserResource($user);
    }
    

    /**
     * Login a user 
     * 
     * This method is used to login a user.d
     */
    public function loginUser(User $user, Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        
        $user = User::where('email', $fields['email'])->first();
        
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Login yoki parrol hato'
            ], 401);
        }
        
        $token = $user->createToken('myapptoken')->plainTextToken;
        
        $user->token = $token;

        return new UserResource($user);
    }
    
    /**
     * Logout a user
     * 
     * This method is used to logout a user.
     */
    public function logoutUser(Request $request)
    {
        $request->user()->token()->delete();
        
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
        
}

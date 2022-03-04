<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
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
    public function registerUser(AuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'phone_number' => $request->phone_number,
            'access' => json_encode($request->access),
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
            'login' => 'required|string',
            'password' => 'required|string'
        ]);
        
        $user = User::where('login', $fields['login'])->first();
        
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
    public function logoutUser(Request $request, $id)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function updatePassword(Request $request)
    {
        $fields = $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6|max:200|confirmed'
        ]);

        $user = $request->user();

        if (!Hash::check($fields['old_password'], $user->password)) {
            return response([
                'message' => 'Eski password noto\'gri'
            ], 401);
        }

        $user->password = Hash::make($fields['new_password']);
        $user->save();

        return response()->json([
            'message' => 'Password updated successfully'
        ]);
        
    }

    public function updateProfile(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'access' => 'required|array',
            'phone_number' => 'required|string'
        ]);

        $user = $request->user();
        
        $user->update([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'access' => json_encode($fields['access']),
            'phone_number' => $fields['phone_number']
        ]);

        return new UserResource($user);
    }

    public function getAllUsers()
    {
        $users = User::all();

        return UserResource::collection($users);

    }

    public function destroy(Request $request)
    {
        $ids = $request->getContent();

        foreach(json_decode($ids) as $id) {
            $address = User::findOrFail($id);
            $address->delete();
        }
    }
}

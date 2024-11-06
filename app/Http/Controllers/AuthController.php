<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Configuration;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signUp(Request $request) {
        $user = User::where('email', $request['email'])->first();
        if ($user) {
            return response()->json([
                'message' => 'E-mail already in use',
            ], 400);
        }
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        
        $configuration = Configuration::create([
            'currency' => 'PLN',
            'taxRate' => 23
        ]);
        
        $validatedData['configurationId'] = $configuration->id;
        $validatedData['packageId'] = 1;
        $validatedData['subscriptionExpireDate'] = Carbon::now()->addDays(14);
        $validatedData['isAdmin'] = false;
        $validatedData['isSuperUser'] = false;
        
        $user = User::create($validatedData);

        $token = $user->createToken($request->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
    }

    public function signIn(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Incorrect credentials',
            ], 400);
        }

        $token = $user->createToken($user->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken,
        ];
    }

    public function deleteAccount(Request $request) {
        $request->user()->tokens()->delete();

        $request->user()->delete();
    }
}

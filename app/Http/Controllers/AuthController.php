<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Configuration;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function signUp(Request $request) {
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

        $token = $user->createToken($request->email);

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    public function signIn(Request $request) {
        return 'signIn';
    }
}

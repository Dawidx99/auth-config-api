<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        throw new HttpResponseException(
            response()->json(['message' => 'Unauthorized'], 401)
        );
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        try {

                $request->authenticate();
            $token = $request->user()->createToken('token');

            $user =$request->user();

            return response()->json(['token' => $token->plainTextToken, 'user_id' => $user['id']]);
        } catch (Exception) {
            return response()->json(401);
        }
    }
}

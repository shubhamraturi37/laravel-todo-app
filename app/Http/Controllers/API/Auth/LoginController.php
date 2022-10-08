<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{


    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        if (!Auth::guard('web')->attempt($request->credentials())) {

            throw ValidationException::withMessages([
                'email' => Lang::get('auth.failed'),
            ]);
        }

        $user = Auth::guard('web')->user();

        $token = $user->createToken($request->input('device_name'));

        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $token->plainTextToken,
        ]);
    }

    /**
     * @throws ValidationException
     *
     */
    public function logout(Request $request): \Illuminate\Http\Response
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->noContent();
    }

}

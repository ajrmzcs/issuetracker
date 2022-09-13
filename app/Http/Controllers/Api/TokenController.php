<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokenRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param TokenRequest $request
     * @return JsonResponse
     */
    public function __invoke(TokenRequest $request): JsonResponse
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Login information is invalid.'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('authToken');
        return response()->json([
            'token' => $token->plainTextToken,
            'token_type' => 'Bearer'
        ]);

    }
}

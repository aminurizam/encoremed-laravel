<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if (!$user) return response()->json(['error' => 'User not found'], 404);

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('authToken');
            $data = [
                'user' => $user,
                'access_token' => $token->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
            ];
            return response($data, 200);
        } else {
            return response()->json(['error' => 'Wrong password'], 403);
        }
    }
}

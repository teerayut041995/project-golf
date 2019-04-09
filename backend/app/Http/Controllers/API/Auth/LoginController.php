<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\ApiController;
use App\User;

class LoginController extends ApiController
{
    public function login(Request $request)
    {
    	$request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);


        if(!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return $this->errorResponse('ไม่สามารถเข้าสู่ระบบได้ โปรดตรวจสอบอีเมลืหรือรหัสผ่านของคุณอีกครั้ง', 401);
        }
        
        $user = $request->user();
        $tokenResult = $user->createToken('Movies Personal Access Client');
        $token = $tokenResult->token;
        $token->save();

        $date_login = Carbon::now();
        $date_expires = Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString();
        $day = Carbon::now()->addSeconds($date_login->diffInSeconds($date_expires));
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'expiresIn' => $date_login->diffInSeconds($date_expires),
            'day' => $day->diffInDays(),
            'data' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->showMessage('Successfully logged out' , 200);
    }
}

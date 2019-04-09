<?php

namespace App\Http\Controllers\API\Auth;

use App\User;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Date;
use App\Http\Controllers\ApiController;

class RegisterController extends ApiController
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return $this->showOne('register successfully!', $user , 200);
    }
}

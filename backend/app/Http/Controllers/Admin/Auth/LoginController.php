<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
    	return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
    	if(!Auth::attempt(['username' => $request->username, 'password' => $request->password, 'admin' => 'true', 'verified' => '1'])) 
    	{
    		return redirect('auth/login')
            	->withErrors('ไม่สามารถเข้าสู่ระบบได้ username หรือ password ไม่ถูกต้อง');
        }

        return redirect('/')->with('status', 'ยินดีตอนรับ กลับเข้าสู่ระบบของเราอีกครั้ง');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}

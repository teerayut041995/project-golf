<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
 //    public function __construct()
	// {
	//     $this->middleware('auth');
	// }

	public function index()
	{
		return view('admin.index');
	}

	public function make_as_read()
	{
		auth()->user()->unreadNotifications->markAsRead();
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;
use App\Notifications\PromotionOrderNotify;
use App\User;
use App\PromotionOrder;


class TestNotifyController extends Controller
{
    public function index()
    {
    	$order = PromotionOrder::find(16);
    	$user = User::where('id' , '1')->first();
    	$user->notify(new PromotionOrderNotify($order));
    	return $user;
    }
}

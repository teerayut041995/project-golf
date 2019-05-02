<?php

namespace App\Http\Controllers\API\Activity;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Activity;
use App\ActivityOrder;
use App\Bank;
use Carbon\Carbon;

class ActivityOrderController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request) {
        $user = $request->user();
        $orders = ActivityOrder::where('user_id' , $user->id)->get();
        return $this->showAllTransform("load data activity order successfully" , $orders , 200);
    }

    public function buy(Request $request)
    {  
    	$activity = Activity::find($request->id);
    	$order = new ActivityOrder([
    		'user_id' => $request->user()->id,
    		'activity_id' => $request->id,
    		'amount' => $activity->act_price,
    		'start_date' => $activity->act_start_date,
    		'end_date' => $activity->act_end_date,
    	]);
    	$order->save();
        return $this->showOneTransform("success promotion" , $order , 200);
    }

    public function order_detail($id) {
    	$order = ActivityOrder::find($id);
    	return $this->showOneTransform("success promotion" , $order , 200);
    	// $order = ActivityOrder::all();
    	// return $this->showAllTransform("success promotion" , $order , 200);
    	//return $order;
    }

    public function update_payment(Request $request , $id) {
        if ($request->payment_image) {
            $image = $request->payment_image;  // your base64 encoded
            $image = explode(',', $image);
            $image = str_replace(' ', '+', $image[1]);
            $imageName = md5(rand()*time()).'.'.'jpg';
            \File::put(public_path(). '/images/activity-payment/' . $imageName, base64_decode($image));
        }
        $order = ActivityOrder::find($id);
        $order->bank_id = $request->bank_id;
        $order->payment_date = Carbon::parse($request->payment_date)->toDateString();
        $order->payment_time = $request->payment_time;
        $order->payment_amount = $request->payment_amount;
        $order->payment_image = $imageName;
        $order->order_status = 'playment';
        $order->save();
        // return $this->showMessage( , 200);
        return $this->showOneTransform("update activity order success" , $order , 200);
    }
}

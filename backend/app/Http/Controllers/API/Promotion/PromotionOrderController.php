<?php

namespace App\Http\Controllers\API\Promotion;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Notifications\PromotionOrder;
use App\Promotion;
use App\PromotionOrder;
use Carbon\Carbon;

class PromotionOrderController extends ApiController
{
	public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request) {
        $user = $request->user();
        $orders = PromotionOrder::where('user_id' , $user->id)->get();
        return $this->showAllTransform("load data promotion order successfully" , $orders , 200);
    }

    public function buy(Request $request)
    {
    	$check = PromotionOrder::where('promotion_id' , $request->id)
    				->where('user_id' , $request->user()->id)
    				->where('service_date' , $request->service_date)
    				->count();
    	if ($check > 0) {
    		return $this->errorResponse('คุณได้ทำการสั่งซื้อโปรโมชันนี้ ในวันที่ '.$request->service_date.' แล้ว', 422);
    	}
    	$promotion = Promotion::find($request->id);
    	$order = new PromotionOrder([
    		'user_id' => $request->user()->id,
    		'promotion_id' => $request->id,
    		'amount' => $promotion->pro_price,
    		'service_date' => $request->service_date,
    		'start_date' => $promotion->pro_start_date,
    		'end_date' => $promotion->pro_end_date,
    	]);
    	$order->save();
        return $this->showOneTransform("save order promotion successfully" , $order , 200);
    	// return $request->user()->id;
    }

    public function order_detail(Request $request, $id) {
    	$order = PromotionOrder::where('id', $id)->where('user_id', $request->user()->id)->first();
    	return $this->showOneTransform("success promotion" , $order , 200);
    }

    public function update_payment(Request $request , $id) {
        if ($request->payment_image) {
            $image = $request->payment_image;  // your base64 encoded
            $image = explode(',', $image);
            $image = str_replace(' ', '+', $image[1]);
            $imageName = md5(rand()*time()).'.'.'jpg';
            \File::put(public_path(). '/images/promotion-payment/' . $imageName, base64_decode($image));
        }
        $order = PromotionOrder::where('id', $id)->where('user_id', $request->user()->id)->first();
        $order->bank_id = $request->bank_id;
        $order->payment_date = Carbon::parse($request->payment_date)->toDateString();
        $order->payment_time = $request->payment_time;
        $order->payment_amount = $request->payment_amount;
        $order->payment_image = $imageName;
        $order->order_status = 'playment';
        $order->save();
        // return $this->showMessage( , 200);
        return $this->showOneTransform("update promotion order success" , $order , 200);
    }

}

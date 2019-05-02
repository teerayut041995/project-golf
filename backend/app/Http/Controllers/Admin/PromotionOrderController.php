<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PromotionOrder;

class PromotionOrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$orders = PromotionOrder::orderBy('created_at' , 'DESC')->get();
    	return view('admin.orders-promotion.index' , compact('orders'));
    }

    public function show($id)
    {
    	$order = PromotionOrder::find($id);
    	return view('admin.orders-promotion.show' , compact('order'));
    }

    public function update_payment(Request $request, $id)
    {
    	$order = PromotionOrder::find($id);
    	$order->order_status = $request->order_status;
    	$order->message = $request->message;
    	$order->save();
    	return redirect('/admin/orders/promotions/'. $id)->with('status', 'บันทึกข้อมูลการชำระเงินแล้ว');
    }

}

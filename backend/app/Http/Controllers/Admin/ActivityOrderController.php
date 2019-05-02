<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActivityOrder;

class ActivityOrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$orders = ActivityOrder::orderBy('created_at' , 'DESC')->get();
    	return view('admin.orders-activity.index' , compact('orders'));
    }

    public function show($id)
    {
    	$order = ActivityOrder::find($id);
    	return view('admin.orders-activity.show' , compact('order'));
    }

    public function update_payment(Request $request, $id)
    {
    	$order = ActivityOrder::find($id);
    	$order->order_status = $request->order_status;
    	$order->message = $request->message;
    	$order->save();
    	return redirect('/admin/orders/activities/'. $id)->with('status', 'บันทึกข้อมูลการชำระเงินแล้ว');
    }
}

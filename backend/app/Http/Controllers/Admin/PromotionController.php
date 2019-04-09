<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use App\Http\Requests\PromotionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotion.index' , compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        if ($request->file('pro_image') != '') {
            $file_image = $request->file('pro_image');
            $pro_image = md5(rand()*time()) . '.' . $file_image->getClientOriginalExtension();
            $file_image->move(public_path('images/promotion'), $pro_image);
        } else {
            $pro_image = "";
        }
        $promotion = new Promotion([
            'pro_name' => $request->pro_name,
            'pro_price' => $request->pro_price,
            'pro_detail' => $request->pro_detail,
            'pro_start_date' => $request->pro_start_date,
            'pro_end_date' => $request->pro_end_date,
            'pro_image' => $pro_image,
        ]);
        $promotion->save();
        return redirect('/admin/promotions/create')->with('status', 'บันทึกข้อมูลโปรโมชันเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        return view('admin.promotion.show' , compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotion.edit' , compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request, Promotion $promotion)
    {
        if ($request->file('pro_image') == '') {
            $image_name = $request->get('pro_image_old');
        } else {
            $image = $request->file('pro_image');
            $image_name = md5(rand()*time()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/promotion'), $image_name);
            if ($request->get('pro_image_old') != '') {
                @unlink(public_path().'/images/promotion/'.$request->get('pro_image_old'));
            }
        }
        $promotion->pro_name = $request->pro_name;
        $promotion->pro_price = $request->pro_price;
        $promotion->pro_detail = $request->pro_detail;
        $promotion->pro_start_date = $request->pro_start_date;
        $promotion->pro_end_date = $request->pro_end_date;
        $promotion->pro_image = $image_name;
        $promotion->save();
        return redirect('admin/promotions/'.$promotion->id.'/edit')->with('status','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        if ($promotion->pro_image != '') {
            @unlink(public_path().'/images/promotion/'.$promotion->pro_image);
        }
        $promotion->delete();
        return redirect('admin/promotions')->with('status','ลบข้อมูลเรียบร้อยแล้ว');
    }
}

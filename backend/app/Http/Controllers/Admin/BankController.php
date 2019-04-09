<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;

class BankController extends Controller
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
        $banks = Bank::all();
        return view('admin.banks.index' , compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        if ($request->file('promptpay_qr') != '') {
            $file_image = $request->file('promptpay_qr');
            $image_name = md5(rand()*time()) . '.' . $file_image->getClientOriginalExtension();
            $file_image->move(public_path('images/bank'), $image_name);
        } else {
            $image_name = "";
        }
        $bank = new Bank([
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'promptpay_qr' => $image_name,
            'promptpay_number' => $request->promptpay_number,
        ]);
        $bank->save();
        return redirect('/admin/banks/create')->with('status', 'บันทึกข้อมูลธนาคารเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('admin.banks.edit' , compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(BankRequest $request, Bank $bank)
    {
        if ($request->file('promptpay_qr') == '') {
            $image_name = $request->get('promptpay_qr_old');
        } else {
            $image = $request->file('promptpay_qr');
            $image_name = md5(rand()*time()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/bank'), $image_name);
            if ($request->get('promptpay_qr_old') != '') {
                @unlink(public_path().'/images/bank/'.$request->get('promptpay_qr_old'));
            }
        }
        $bank->bank_name = $request->bank_name;
        $bank->bank_branch = $request->bank_branch;
        $bank->account_name = $request->account_name;
        $bank->account_number = $request->account_number;
        $bank->promptpay_qr = $image_name;
        $bank->promptpay_number = $request->promptpay_number;
        $bank->save();
        return redirect('admin/banks/'.$bank->id.'/edit')->with('status','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        if ($bank->promptpay_qr != '') {
            @unlink(public_path().'/images/bank/'.$bank->promptpay_qr);
        }
        $bank->delete();
        return redirect('admin/banks')->with('status','ลบข้อมูลเรียบร้อยแล้ว');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Http\Requests\ActivityUpdateRequest;

class ActivityController extends Controller
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
        $activities = Activity::all();
        return view('admin.activity.index' , compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        if ($request->file('act_image') != '') {
            $file_image = $request->file('act_image');
            $act_image = md5(rand()*time()) . '.' . $file_image->getClientOriginalExtension();
            $file_image->move(public_path('images/activity'), $act_image);
        } else {
            $act_image = "";
        }
        //$images = $request->file('act_image')->store('activity');
        $activity = new Activity([
            'act_name' => $request->act_name,
            'act_price' => $request->act_price,
            'act_detail' => $request->act_detail,
            'act_start_date' => $request->act_start_date,
            'act_end_date' => $request->act_end_date,
            'act_image' => $act_image,
        ]);
        $activity->save();
        return redirect('/admin/activities/create')->with('status', 'บันทึกข้อมูลกิจกรรมเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('admin.activity.edit' , compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityUpdateRequest $request, Activity $activity)
    {
        if ($request->file('act_image') == '') {
            $image_name = $request->get('act_image_old');
        } else {
            $image = $request->file('act_image');
            $image_name = md5(rand()*time()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/activity'), $image_name);
            if ($request->get('act_image_old') != '') {
                @unlink(public_path().'/images/activity/'.$request->get('act_image_old'));
            }
        }
        $activity->act_name = $request->act_name;
        $activity->act_price = $request->act_price;
        $activity->act_detail = $request->act_detail;
        $activity->act_start_date = $request->act_start_date;
        $activity->act_end_date = $request->act_end_date;
        $activity->act_image = $image_name;
        $activity->save();
        return redirect('admin/activities/'.$activity->id.'/edit')->with('status','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        if ($activity->act_image != '') {
            @unlink(public_path().'/images/activity/'.$activity->act_image);
        }
        $activity->delete();
        return redirect('admin/activities')->with('status','ลบข้อมูลเรียบร้อยแล้ว');
    }
}

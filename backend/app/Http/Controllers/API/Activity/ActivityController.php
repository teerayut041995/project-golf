<?php

namespace App\Http\Controllers\API\Activity;

use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ActivityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function calendar()
    {
        $activity = Activity::all();
        //return $this->showAll("success promotion" , $activity , 200);
        return $this->showAllTransform('load data activity calendar success' , $activity , 201);
    }
    

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $activity = Activity::where('act_slug' , $slug)->first();
        return $this->showOneTransform("success promotion" , $activity , 200);
    }

}

<?php

namespace App\Http\Controllers\API\Promotion;

use App\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Promotion as PromotionResource;
use Carbon\Carbon;

class PromotionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion = Promotion::where('pro_end_date', '>=' , Carbon::now())
                            ->orderBy('pro_start_date' , 'ASC')
                            ->get();
        return $this->showAllTransform("success promotion" , $promotion , 200);
    }

    public function now() {

        $promotion = Promotion::where('pro_start_date', '<' , Carbon::now())
                              ->where('pro_end_date', '>' , Carbon::now())
                              ->get();
        return $this->showAllTransform("success promotion" , $promotion , 200);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $promotion = Promotion::where('pro_slug' , $slug)->first();
        return $this->showOneTransform("success promotion" , $promotion , 200);
    }
}

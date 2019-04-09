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
        //return $promotion = PromotionResource::collection(Promotion::all());
        //$promotion = PromotionsResource(Promotion::all());
        //return $promotion;
        $promotion = Promotion::all();
        return $this->showAllTransform("success promotion" , $promotion , 200);
    }

    public function promotionNow() {

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
    public function show($id)
    {
        //return new PromotionResource(Promotion::find($id));
        // $promotion = PromotionsResource::collection(Promotion::find($id));
        // return $promotion;
        // $promotion = PromotionsResource::collection(Promotion::all());
        // return $promotion;
        $promotion = Promotion::find($id);
        return $this->showOne("load data promotion success" , $promotion , 200);
    }
}

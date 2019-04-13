<?php

namespace App\Transformers;

use App\Promotion;
use League\Fractal\TransformerAbstract;
use Carbon\Carbon;

class PromotionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Promotion $promotion)
    {
        return [
            'id' => $promotion->id,
            'pro_name' => $promotion->pro_name,
            'pro_slug' => $promotion->pro_slug,
            'pro_detail' => $promotion->pro_detail,
            'pro_price' => number_format($promotion->pro_price , 2),
            'pro_image' => url('images/promotion' , $promotion->pro_image),
            'pro_start_date' => $promotion->pro_start_date,
            'start_date_thai' => createDateThai($promotion->pro_start_date),
            'pro_end_date' => $promotion->pro_end_date,
            'end_date_thai' => createDateThai($promotion->pro_end_date),
            'time_ago' => Carbon::createFromTimeStamp(strtotime($promotion->created_at))->diffForHumans(),
            'created_at' => $promotion->created_at,
            'updated_at' => $promotion->updated_at,
        ];
    }
}

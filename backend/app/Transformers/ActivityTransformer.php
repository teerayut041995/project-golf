<?php

namespace App\Transformers;

use App\Activity;
use League\Fractal\TransformerAbstract;
use Carbon\Carbon;

class ActivityTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Activity $activity)
    {
        return [
            'id' => (int)$activity->id,
            'act_name' => (string)$activity->act_name,
            'act_slug' => (string)$activity->act_slug,
            'act_detail' => (string)$activity->act_detail,
            'act_image' => url('images/activity' , $activity->act_image),
            'act_start_date' => (string)$activity->act_start_date,
            'act_end_date' => (string)$activity->act_end_date,
            'time_ago' => Carbon::createFromTimeStamp(strtotime($activity->created_at))->diffForHumans(),
            'created_at' => (string)$activity->created_at,
            'updated_at' => (string)$activity->updated_at,
        ];
    }
}

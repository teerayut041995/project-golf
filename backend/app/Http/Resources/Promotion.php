<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class Promotion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pro_name' => $this->pro_name,
            'pro_slug' => $this->pro_slug,
            'pro_detail' => $this->pro_detail,
            'pro_image' => $this->pro_image,
            'pro_start_date' => $this->pro_start_date,
            'time_ago' => Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

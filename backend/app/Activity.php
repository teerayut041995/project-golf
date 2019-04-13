<?php

namespace App;

use App\Transformers\ActivityTransformer;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Activity extends Model
{
    use Sluggable;

    public $transformer = ActivityTransformer::class;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'act_slug' => [
                'source' => 'act_name'
            ]
        ];
    }

    protected $fillable = [
    	'act_name' , 'act_slug', 'act_detail' , 'act_image' , 'act_start_date' , 'act_end_date'
    ];

}

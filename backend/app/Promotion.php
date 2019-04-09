<?php

namespace App;

use App\Transformers\PromotionTransformer;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Promotion extends Model
{
    use Sluggable;

    public $transformer = PromotionTransformer::class;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'pro_slug' => [
                'source' => 'pro_name'
            ]
        ];
    }
    
    protected $fillable = [
    	'pro_name', 'pro_slug', 'pro_price', 'pro_detail', 'pro_image', 'pro_start_date', 'pro_end_date', 'pro_status'
    ];
}

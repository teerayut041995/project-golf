<?php

namespace App;

use App\Transformers\PromotionOrderTransformer;
use Illuminate\Database\Eloquent\Model;

class PromotionOrder extends Model
{
	public $transformer = PromotionOrderTransformer::class;

    protected $fillable = [
    	'user_id', 'promotion_id', 'amount', 'service_date', 'start_date', 'end_date', 'order_status', 'message', 'bank_id', 'payment_date', 'payment_time', 'payment_amount', 'payment_image'
    ];

    public function promotion()
    {
    	return $this->belongsTo('App\Promotion');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
}

<?php

namespace App;

use App\Transformers\ActivityOrderTransformer;
use Illuminate\Database\Eloquent\Model;

class ActivityOrder extends Model
{
	public $transformer = ActivityOrderTransformer::class;

    protected $fillable = [
    	'user_id', 'activity_id', 'amount', 'start_date', 'end_date', 'order_status', 'message', 'bank_id', 'payment_date', 'payment_time', 'payment_amount', 'payment_image'
    ];

    public function activity()
    {
    	return $this->belongsTo('App\Activity');
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
	use SoftDeletes;

    protected $fillable = [
    	'bank_name', 'bank_branch', 'account_name', 'account_number', 'promptpay_qr' , 'promptpay_number'
    ];
}

<?php

namespace App;

use App\Transformers\BankTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
	use SoftDeletes;

	public $transformer = BankTransformer::class;
	
    protected $fillable = [
    	'bank_name', 'bank_branch', 'account_name', 'account_number', 'promptpay_qr' , 'promptpay_number'
    ];
}

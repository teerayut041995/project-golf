<?php

namespace App\Transformers;

use App\Bank;
use League\Fractal\TransformerAbstract;

class BankTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Bank $bank)
    {
        if ($bank->promptpay_qr != '') {
            $promptpay_qr = url('images/bank' , $bank->promptpay_qr);
        } else {
            $promptpay_qr = url('images/default/no-image-qr-code.png');
        }
        
        return [
            'id' => (int)$bank->id,
            'bank_name' => (string)$bank->bank_name,
            'bank_branch' => (string)$bank->bank_branch,
            'account_name' => (string)$bank->account_name,
            'account_number' => (string)$bank->account_number,
            'promptpay_qr' => (string)$promptpay_qr,
            'promptpay_number' => (string)$bank->promptpay_number,
            'created_at' => (string)$bank->created_at,
            'updated_at' => (string)$bank->updated_at,
        ];
    }
}

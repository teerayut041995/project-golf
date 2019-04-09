<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'account_name' => 'required',
            'account_number' => 'required'
        ];
    }

    public function messages()
    {
        $messages = [
            'bank_name.required' => 'กรุณากรอกชื่อธนาคาร',
            'bank_branch.required' => 'กรุณากรอกสาขา',
            'account_name.required' => 'กรุณากรอกชื่อบัญชี',
            'account_number.required' => 'กรุณากรอกหมายเลขบัญชี',
        ];
        return $messages;
    }
}

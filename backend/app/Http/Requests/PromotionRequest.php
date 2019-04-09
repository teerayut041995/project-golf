<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'pro_name' => 'required|max:191',
            'pro_price' => 'required|numeric',
            'pro_start_date' => 'required|date',
            'pro_end_date' => 'required|date',
        ];
    }

    public function messages()
    {
        $messages = [
            'pro_name.required' => 'กรุณากรอกชื่อโปรโมชัน',
            'pro_price.required' => 'กรุณากรอกราคาโปรโมชัน',
            'pro_price.numeric' => 'กรุณากรอกราคาเป็นตัวเลข',
            'pro_start_date.required' => 'กรุณากรอกวันที่เริ่มโปรโมชัน',
            'pro_start_date.date' => 'กรุณากรอกเป็นวันที่',
            'pro_end_date.required' => 'กรุณากรอกวันที่สิ้นสุดโปรโมชัน',
            'pro_end_date.date' => 'กรุณากรอกเป็นวันที่'
        ];
        return $messages;
    }
}

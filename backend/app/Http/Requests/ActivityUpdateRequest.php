<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityUpdateRequest extends FormRequest
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
            'act_name' => 'required|max:191',
            'act_start_date' => 'required|date',
            'act_end_date' => 'required|date'
            //'act_end_date' => 'required|date|date_format:Y-m-d|after:start_at',
        ];
    }

    public function messages()
    {
        $messages = [
            'act_name.required' => 'กรุณากรอกชื่อกิจกรรม',
            'act_start_date.required' => 'กรุณากรอกวันที่เริ่มกิจกรรม',
            'act_start_date.date' => 'กรุณากรอกเป็นวันที่',
            'act_end_date.required' => 'กรุณากรอกวันที่สิ้นสุดกิจกรรม',
            'act_end_date.date' => 'กรุณากรอกเป็นวันที่'
        ];
        return $messages;
    }
}

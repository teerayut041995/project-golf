<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'username' => 'required|string|unique:users',
            'password' => 'required|string||min:6|confirmed',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'กรุณากรอกชื่อ นามสุกล',
            'username.required' => 'กรุณากรอกชื่อเข้าใช้งาน',
            'username.unique' => 'มีชื่อเข้าใช้งานนี้อยู่แล้ว',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'รหัสผ่านต้องมีความยาวอย่างน้อย :min ตัวอักษร',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
            'phone.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'phone.numeric' => 'หมายเลขโทรศัพท์ต้องเป็นตัวเลขเท่านั้น',
        ];
        return $messages;
    }
}

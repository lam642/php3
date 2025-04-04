<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //bật authrize true cho phép request được sử dùng
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //rules trả về mảng dữ liệu đầu vào
        return [
            "name" => "required|max:255",
            "status" => "required|in:0,1"
        ];
    }
    public function messages(){
        return [
            "name.required" => "tên không được bỏ trống",
            "name.max" => "Tên không vượt quá 255 ký tự",

            "status.required" => "Trạng thái không được bỏ trống",
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //authorize mặc đinh fasle chuyển thành true cho phép request được hoạt động
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   // rules trả về mảng kiểm trả dữ liệu đầu vào
        return [
            //
            "name" => "required|string|max:255",
            "price" => "required|numeric|min:0",
            "quantity" => "required|numeric|min:0",
            "image" => "nullable|image|mimes:jpg,jpeg,png,gif|max:2048",
            "category_id" => "required|exists:categories,id",
            "status" => "required|in:0,1",
            "description" => "required|string|nullable",
        ];

    }
    public function messages()
    {
        return [
            "name.required" => "Tên không được bỏ trống",
            "name.string" => "Tên phải là chuỗi ký tự",
            "name.max:255" => "Tên không để vượt quá 255 ký tự",

            "price.required" => "Giá không được bỏ trống",
            "price.numeric" => "Giá phải là số",
            "price.min:0" => "Giá phải lớn 0",
            
            'image.image' => 'File tải lên phải là một hình ảnh.',
            'image.mimes' => 'Chỉ chấp nhận các định dạng ảnh: jpg, jpeg, png, gif.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',

            "category_id.required" => "Phải chọn danh mục",

            "status.required" => "Phải chọn trạng thái",

            "description.string" => "Phải là chuỗi",
        ];
    }
    
}

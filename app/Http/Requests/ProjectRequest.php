<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:6',
            'email' => 'required|min:6'
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => ':attribute bắt buộc phải nhập',
            'username.min' => ':attribute bắt buộc phải nhập ít nhất :min ký tự',
            'email.required' => ':attribute bắt buộc phải nhập',
            'email.min' => ':attribute bắt buộc phải nhập ít nhất :min ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'username' => 'Tên người dùng',
            'email' => 'Email người dùng',
        ];
    }
}

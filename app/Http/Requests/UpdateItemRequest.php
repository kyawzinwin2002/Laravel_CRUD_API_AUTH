<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = request()->item->id;
        return [
            "name" => "required|min:3|max:50|unique:items,name,$id",
            "price" => "required|gte:50|lte:1000000|numeric",
            "stock" => "required|numeric|gt:3"
        ];
    }
}
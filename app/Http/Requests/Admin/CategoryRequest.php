<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod("POST")){
            return [
                "title" => ["required", "string", "min:3", "max:255", Rule::unique("categories", "title")],
            ];
        }elseif(request()->isMethod("PATCH")){
            return [
                "title" => ["required", "string", "min:3", "max:255", Rule::unique("categories", "title")->ignore($this->category->id, "id")],
                "status" => ["required"],
            ];
        }
    }
}
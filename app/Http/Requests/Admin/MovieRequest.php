<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovieRequest extends FormRequest
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
                "title" => ["required", "string", "min:3", "max:255", Rule::unique("movies", "title")],
                "description" => ["required", "string", "min:3"],
                "rate" => ["required"],
                "thumbnail" => ["required", "image", "mimes:jpg,png,jpeg,gif,svg", "max:5048"],
                "category_id" => ["required", Rule::exists("categories", "id")],
            ];
        }elseif(request()->isMethod("PATCH")){
            return [
                "title" => ["required", "string", "min:3", "max:255", Rule::unique("movies", "title")->ignore($this->movie->id, "id")],
                "description" => ["required", "string", "min:3"],
                "rate" => ["required"],
                "thumbnail" => ["image", "mimes:jpg,png,jpeg,gif,svg", "max:5048"],
                "category_id" => ["required", Rule::exists("categories", "id")],
                "status" => ["required"],
            ];
        }
    }
}
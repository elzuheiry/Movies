<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
                "name" => ["required", "string", "min:3", "max:255", Rule::unique("users", "name")],
                "username" => ["required", "string", "min:3", "max:255", Rule::unique("users", "username")],
                "email" => ["required", "string", "email", Rule::unique("users", "email")],
                "password" => ["required", "min:6", "confirmed"],
                "birthdate" => ["required", "date"],
            ];
        }elseif(request()->isMethod("PATCH")){
            return [
                "name" => ["required", "string", "min:3", "max:255", Rule::unique("users", "name")->ignore($this->user->id, "id")],
                "username" => ["required", "string", "min:3", "max:255", Rule::unique("users", "username")->ignore($this->user->id, "id")],
                "email" => ["required", "string", "email", Rule::unique("users", "email")->ignore($this->user->id, "id")],
                "birthdate" => ["required", "date"],
            ];
        }
    }
}
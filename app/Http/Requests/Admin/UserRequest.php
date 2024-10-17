<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name' => 'required',
                        'email' => 'required|unique:users,email',
                        'mobile' => 'nullable|min:9',
                        'password' => 'required',
                        'user_type' => 'required',
                    ];
                }
            case 'PUT': {
                }
            case 'PATCH': {
                    return [
                        'name' => 'required',
                       'email' => 'required|unique:users,email,'. $this->user->id,
                        'mobile' => 'nullable|min:9',
                        'password' => 'required',
                        'user_type' => 'required',
                    ];
                }
            default:
                break;
        }

        return [

        ];
    }
}

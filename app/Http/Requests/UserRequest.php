<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Dingo\Api\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,' . app('Dingo\Api\Auth\Auth')->user()->id,
            'first_name' => 'string',
            'last_name' => 'string',
            'birthday' => 'date',
            'avatar' => 'url'
        ];
    }
}

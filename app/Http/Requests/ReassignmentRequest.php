<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;

class ReassignmentRequest extends FormRequest
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
            'comment' => 'required',
            'to' => 'exists:users,id|not_in:' . $this->task->assigned_to
        ];
    }
}

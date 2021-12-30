<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $required = !$this->user ? 'required|' : '';
        $updateEmail = !$this->user ? '' : $this->user->id . ',id';

        return [
            'username' => $required . 'min:6|unique:users,username',
            'email' => $required . 'email|unique:users,email,' . $updateEmail,
            'password' => $required . 'min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,40}$/i',
            'lend_quantity' => 'numeric',
        ];
    }
}

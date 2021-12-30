<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        $required = !$this->book ? 'required|' : '';

        return [
            'title' => $required . 'max:255',
            'category_id' => $required,
            'total_quantity' => 'numeric',
            'lend_quantity' => 'numeric',
        ];
    }
}

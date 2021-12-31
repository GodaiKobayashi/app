<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile->name' => 'required|max:10',
            'image' => 'required',
            'profile[short]' => 'required|max:20',
            'devices_array[]' => 'required',
            'ranks_array[]' => 'required'
        ];
    }
}

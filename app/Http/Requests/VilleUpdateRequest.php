<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VilleUpdateRequest extends FormRequest
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
        $id = $this->ville;
        return [
            'name' => 'required|unique:villes,name,' .$id,
            'region_id' => 'required|integer'
        ];
    }
}

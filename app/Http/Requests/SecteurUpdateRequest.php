<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecteurUpdateRequest extends FormRequest
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
        $id = $this->secteur;
        return [
            'name' => 'required|unique:secteurs,name,' .$id
        ];
    }
}

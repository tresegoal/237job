<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationUpdateRequest extends FormRequest
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
        $id = $this->formations;
        return [
            'etablissement' => 'required,etablissement,' .$id,
            'debut' => 'required',
            'fin' => 'required',
            'specialite' => 'required|max:255',
            'etude_id' => 'required|integer',
            'level_id' => 'required|integer',
            'country_id' => 'required|integer',
        ];
    }
}

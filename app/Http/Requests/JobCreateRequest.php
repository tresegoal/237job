<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobCreateRequest extends FormRequest
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
             'titre' => 'required|unique:jobs,titre',
             'description' => 'required',
             'delay' => 'date',
             'category_id' => 'required|integer',
            'entreprise_id' => 'required|integer',
             'type_id' => 'required|integer',
             'salaire_id' => 'required|integer',
             'ville_id' => 'required|integer',
            'level_id' => 'required|integer'
        ];
    }
}

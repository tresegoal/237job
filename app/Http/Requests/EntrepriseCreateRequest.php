<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseCreateRequest extends FormRequest
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
             'name' => 'required|unique:entreprises,name|min:3|max:20|alpha',
             'description' => 'required',
             'email' => 'required|email|unique:entreprises,email',
             'email1' => 'email|unique:entreprises,email1',
             'telephone' => 'required|unique:entreprises,telephone',
             'telephone1' => 'unique:entreprises,telephone1',
             'siteweb' => 'url|unique:entreprises,siteweb',
             'nbreEmploye' => 'integer',
             'secteur_id' => 'required|integer',
             'user_id' => 'required|integer',
             'ville_id' => 'required|integer',
        ];
    }
}

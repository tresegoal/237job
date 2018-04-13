<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaireUpdateRequest extends FormRequest
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
        $id = $this->salaire;
        return [
            'salmin' => 'required|integer|unique:salaires,salmin,' .$id,
            'salmax' => 'required|integer|greater_than_field:salmin|unique:salaires,salmax,' .$id,
        ];
    }
}

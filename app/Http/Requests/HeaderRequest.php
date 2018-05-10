<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
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

    /**z
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'HeaderTitle' => 'required|max:100',
                    'HeaderContenu' => 'max:500',
                ];
            }
            case 'PUT': {
                return [
                    'HeaderTitle' => 'required|max:100',
                    'HeaderContenu' => 'max:500',
                ];
            }
            default:
                break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'HeaderTitle.required' => 'Le champ ne peut être vide',
                    'HeaderTitle.max:100' => 'Trop long !',
                    'HeaderContenu.max:500' => 'Trop long !',
                ];
            }
            default:
                break;
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'string', 'max:255'],
            'contact_phone_number' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255', Rule::unique('clients')->ignore($this->client->id)],
            'company_vat' => ['required', 'integer'],
            'company_address' => ['required', 'string', 'max:255'],
            'company_city' => ['required', 'string', 'max:255'],
            'company_zip' => ['required', 'integer'],
        ];
    }
}

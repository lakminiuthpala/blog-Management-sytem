<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('PUT')) {
            return [
                'serial_number' => ['required','string', 'max:15', Rule::unique('locations', 'serial_number')
                    ->ignore(request()->route('location')->id, 'id')],
                'organization' => 'required',
                'name' => ['required', 'string', 'max:100'],
                'ip_address' => ['required', 'ipv4'],
            ];
        }
        return [
            'serial_number' => ['required', 'string', 'max:15', Rule::unique('locations', 'serial_number')],
            'organization' => 'required',
            'name' => ['required', 'string', 'max:100'],
            'ip_address' => ['required', 'ipv4'],
        ];
    }
}

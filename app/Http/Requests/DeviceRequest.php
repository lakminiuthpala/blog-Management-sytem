<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeviceRequest extends FormRequest
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
                'number' => ['required','numeric', Rule::unique('devices', 'number')
                    ->ignore(request()->route('device')->id, 'id')],
                'location' => 'required',
                'type' => 'required',
                'status' => 'required',
                'image' => ['image', 'max:5000'],
            ];
        }
        return [
            'number' => ['required', 'numeric', Rule::unique('devices', 'number')],
            'location' => 'required',
            'type' => 'required',
            'status' => 'required',
            'image' => ['required', 'image', 'max:5000'],
        ];
    }
}

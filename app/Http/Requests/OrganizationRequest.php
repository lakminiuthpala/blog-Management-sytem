<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrganizationRequest extends FormRequest
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
                'code' => ['required', 'max:10', Rule::unique('organizations', 'code')
                    ->ignore(request()->route('organization')->id, 'id')],
                'name' => ['required', 'string', 'max:100']
            ];
        }
        return [
            'code' => ['required', 'string', 'max:10', Rule::unique('organizations', 'code')],
            'name' => ['required', 'string', 'max:100']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLandingPageLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $page = $this->route('landingPage');
        $config = $page->form_config ?? [];

        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'website' => ['nullable'],
            'lead_source' => ['nullable', 'string', 'max:255'],
            'utm_source' => ['nullable', 'string', 'max:255'],
            'utm_medium' => ['nullable', 'string', 'max:255'],
            'utm_campaign' => ['nullable', 'string', 'max:255'],
        ];

        if ($config['show_last_name'] ?? true) {
            $rules['last_name'] = ['nullable', 'string', 'max:255'];
        }

        if ($config['show_company'] ?? true) {
            $rules['company'] = ['nullable', 'string', 'max:255'];
        }

        if ($config['show_phone'] ?? true) {
            $rules['phone'] = ['nullable', 'string', 'max:50'];
        }

        return $rules;
    }
}

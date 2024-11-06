<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackagesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'string|max:2024',
            'pricePerMonth' => 'required|numeric|min:0.01',
            'pricePerYear' => 'required|numeric|min:0.01',
            'integrationsLimit' => 'required|numeric',
            'productsLimit' => 'required|numeric|min:10',
        ];
    }
}

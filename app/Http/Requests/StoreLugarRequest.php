<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLugarRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array {
		return [
			'nombre' => 'required|string|max:255',
			'pais' => 'required|string|max:255',
			'latitud' => 'nullable|numeric|between:-90,90',
			'longitud' => 'nullable|numeric|between:-180,180',
		];
	}
}

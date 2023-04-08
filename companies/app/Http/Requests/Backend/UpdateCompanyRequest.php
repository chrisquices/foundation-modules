<?php

namespace App\Http\Requests\Backend;

use App\Http\Traits\Foundation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest {

	use Foundation;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return $this->hasPermissionTo('edit_companies');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'name'        => 'required|max:255',
			'description' => 'required|max:255',
			'email'       => 'required|max:255|' . Rule::unique('companies')->ignore($this->route('company')),
			'telephone'   => 'required|max:255',
			'address'     => 'required|max:255',
			'website'     => 'required|max:255|' . Rule::unique('companies')->ignore($this->route('company')),
			'is_active'   => 'required',
		];
	}

}

<?php

namespace App\Http\Requests\Backend;

use App\Http\Traits\Foundation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNationalityRequest extends FormRequest {

	use Foundation;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return $this->hasPermissionTo('edit_nationalities');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules(): array
	{
		return [
			'name'      => 'required|max:255|' . Rule::unique('nationalities')->ignore($this->route('nationality')),
			'code'      => 'required|max:255|' . Rule::unique('nationalities')->ignore($this->route('nationality')),
			'is_active' => 'required',
		];
	}

}

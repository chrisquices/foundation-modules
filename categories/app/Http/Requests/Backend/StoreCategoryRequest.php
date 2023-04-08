<?php

namespace App\Http\Requests\Backend;

use App\Http\Traits\Foundation;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest {

	use Foundation;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return $this->hasPermissionTo('create_categories');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'name'      => 'required|max:255|unique:categories',
			'is_active' => 'required',
		];
	}

}

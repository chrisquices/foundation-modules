<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use App\Http\Traits\Foundation;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller {

	use Foundation;

	public function index()
	{
		return view('backend.categories.index');
	}

	public function create()
	{
		return view('backend.categories.create');
	}

	public function store(StoreCategoryRequest $request)
	{
		$category = new Category();
		$category->name = $request->name;
		$category->is_active = $request->is_active;
		$category->save();

		$this->updateModelPhoto($category, $request, 'categories', 1000, 1000);

		Session::flash('success', __('general.record_saved_successfully'));

		return to_route('backend.categories.show', ['category' => $category->id]);
	}

	public function show(Category $category)
	{
		return view('backend.categories.show', compact('category'));
	}

	public function edit(Category $category)
	{
		return view('backend.categories.edit', compact('category'));
	}

	public function update(UpdateCategoryRequest $request, Category $category)
	{
		$category->name = $request->name;
		$category->is_active = $request->is_active;
		$category->save();

		$this->updateModelPhoto($category, $request, 'categories', 1000, 1000);

		Session::flash('success', __('general.record_updated_successfully'));

		return to_route('backend.categories.show', ['category' => $category->id]);
	}

	public function delete(Category $category)
	{
		try {
			$category->delete();

			Session::flash('success', __('general.record_deleted_successfully'));

		} catch (QueryException $e) {
			Session::flash('error', __('general.record_could_not_be_deleted'));
		}

		return back();
	}

}

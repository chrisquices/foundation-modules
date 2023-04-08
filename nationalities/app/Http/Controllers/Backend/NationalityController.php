<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreNationalityRequest;
use App\Http\Requests\Backend\UpdateNationalityRequest;
use App\Http\Traits\Foundation;
use App\Models\Nationality;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class NationalityController extends Controller {

	use Foundation;

	public function index()
	{
		return view('backend.nationalities.index');
	}

	public function create()
	{
		return view('backend.nationalities.create');
	}

	public function store(StoreNationalityRequest $request)
	{
		$nationality = new Nationality();
		$nationality->name = $request->name;
		$nationality->code = $request->code;
		$nationality->is_active = $request->is_active;
		$nationality->save();

		$this->updateModelPhoto($nationality, $request, 'nationalities', 1000, 1000);
	
		Session::flash('success', __('general.record_saved_successfully'));

		return to_route('backend.nationalities.show', ['nationality' => $nationality->id]);
	}

	public function show(Nationality $nationality)
	{
		return view('backend.nationalities.show', compact('nationality'));
	}

	public function edit(Nationality $nationality)
	{
		return view('backend.nationalities.edit', compact('nationality'));
	}

	public function update(UpdateNationalityRequest $request, Nationality $nationality)
	{
		$nationality->name = $request->name;
		$nationality->code = $request->code;
		$nationality->is_active = $request->is_active;
		$nationality->save();

		$this->updateModelPhoto($nationality, $request, 'nationalities', 1000, 1000);
	
		Session::flash('success', __('general.record_updated_successfully'));

		return to_route('backend.nationalities.show', ['nationality' => $nationality->id]);
	}

	public function delete(Nationality $nationality)
	{
		try {
			$nationality->delete();

			Session::flash('success', __('general.record_deleted_successfully'));

		} catch (QueryException $e) {
			Session::flash('error', __('general.record_could_not_be_deleted'));
		}

		return back();
	}

}

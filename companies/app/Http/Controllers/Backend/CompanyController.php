<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreCompanyRequest;
use App\Http\Requests\Backend\UpdateCompanyRequest;
use App\Http\Traits\Foundation;
use App\Models\Company;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller {

	use Foundation;

	public function index()
	{
		return view('backend.companies.index');
	}

	public function create()
	{
		return view('backend.companies.create');
	}

	public function store(StoreCompanyRequest $request)
	{
		$company = new Company();
		$company->name = $request->name;
		$company->description = $request->description;
		$company->email = $request->email;
		$company->telephone = $request->telephone;
		$company->address = $request->address;
		$company->website = $request->website;
		$company->is_active = $request->is_active;
		$company->save();

		$this->updateModelPhoto($company, $request, 'companies');
		$this->updateModelBanner($company, $request, 'companies');

		Session::flash('success', __('general.record_saved_successfully'));

		return to_route('backend.companies.show', ['company' => $company->id]);
	}

	public function show(Company $company)
	{
		return view('backend.companies.show', compact('company'));
	}

	public function edit(Company $company)
	{
		return view('backend.companies.edit', compact('company'));
	}

	public function update(UpdateCompanyRequest $request, Company $company)
	{
		$company->name = $request->name;
		$company->description = $request->description;
		$company->email = $request->email;
		$company->telephone = $request->telephone;
		$company->address = $request->address;
		$company->website = $request->website;
		$company->save();

		$this->updateModelPhoto($company, $request, 'companies');
		$this->updateModelBanner($company, $request, 'companies');

		Session::flash('success', __('general.record_updated_successfully'));

		return to_route('backend.companies.show', ['company' => $company->id]);
	}

	public function delete(Company $company)
	{
		try {
			$company->delete();

			Session::flash('success', __('general.record_deleted_successfully'));

		} catch (QueryException $e) {
			Session::flash('error', __('general.record_could_not_be_deleted'));
		}

		return back();
	}

}

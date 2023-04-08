<?php

namespace App\Http\Livewire\Backend;

use App\Models\Setting;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesIndex extends Component {

	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	protected $queryString = ['search'];

	public $recordsPerPage;
	public $search;
	public $isActive;

	public function mount()
	{
		$this->recordsPerPage = Setting::recordsPerPage();
	}

	public function render()
	{
		$companiesQuery = Company::query();

		if ($this->search) {
			$companiesQuery->where('name', 'like', '%' . $this->search . '%');
		}

		if ($this->isActive == 'active') {
			$companiesQuery->where('is_active', 1);
		}

		if ($this->isActive == 'inactive') {
			$companiesQuery->where('is_active', 0);
		}

		$companies = $companiesQuery->paginate($this->recordsPerPage);

		$this->dispatchBrowserEvent('reloadDatatables');

		return view('backend.livewire.companies-index', [
			'companies' => $companies,
		]);
	}

	public function updatingSearch()
	{
		$this->resetPage();
	}

}

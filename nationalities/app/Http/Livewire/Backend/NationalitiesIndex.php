<?php

namespace App\Http\Livewire\Backend;

use App\Models\Setting;
use App\Models\Nationality;
use Livewire\Component;
use Livewire\WithPagination;

class NationalitiesIndex extends Component {

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
		$nationalitiesQuery = Nationality::query();

		if ($this->search) {
			$nationalitiesQuery->where('name', 'like', '%' . $this->search . '%');
			$nationalitiesQuery->orWhere('code', 'like', '%' . $this->search . '%');
		}

		if ($this->isActive == 'active') {
			$nationalitiesQuery->where('is_active', 1);
		}

		if ($this->isActive == 'inactive') {
			$nationalitiesQuery->where('is_active', 0);
		}

		$nationalities = $nationalitiesQuery->paginate($this->recordsPerPage);

		$this->dispatchBrowserEvent('reloadDatatables');

		return view('backend.livewire.nationalities-index', [
			'nationalities' => $nationalities,
		]);
	}

	public function updatingSearch()
	{
		$this->resetPage();
	}

}

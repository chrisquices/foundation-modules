<?php

namespace App\Http\Livewire\Backend;

use App\Models\Setting;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesIndex extends Component {

	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $recordsPerPage;
	public $search;
	public $isActive;

	public function mount()
	{
		$this->recordsPerPage = Setting::recordsPerPage();
	}

	public function render()
	{
		$categoriesQuery = Category::query();

		if ($this->search) {
			$categoriesQuery->where('name', 'like', '%' . $this->search . '%');
		}

		if ($this->isActive == 'active') {
			$categoriesQuery->where('is_active', 1);
		}

		if ($this->isActive == 'inactive') {
			$categoriesQuery->where('is_active', 0);
		}

		$categories = $categoriesQuery->paginate($this->recordsPerPage);

		$this->dispatchBrowserEvent('reloadDatatables');

		return view('backend.livewire.categories-index', [
			'categories' => $categories,
		]);
	}

	public function updatingSearch()
	{
		$this->resetPage();
	}

}

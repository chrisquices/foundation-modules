<div>
    <div x-data="{ show: false }">
        <div class="row">

            @include('backend.partials.searchbar')

            @hasPermissionTo('create_categories')
            <div class="col-lg-8 mb-4">
                <a href="{{ route('backend.categories.create') }}" class="btn btn-primary btn-create float-end fw-bold">{{ __('general.create_category') }}</a>
            </div>
            @endhasPermissionTo
        </div>

        <div class="row" x-cloak x-show="show" x-transition>
            <div class="col-lg-3">
                <select class="form-select filter mb-4" id="is_active" name="is_active" wire:model="isActive">
                    <option value="">{{ __('general.view_all_statuses') }}</option>
                    <option value="active">{{ __('general.active') }}</option>
                    <option value="inactive">{{ __('general.inactive') }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="card">
            <div class="card-body">
                @if($categories->total() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover datatable mb-4">
                            <thead>
                            <tr>
                                <th>{{ __('general.name') }}</th>
                                <th>{{ __('general.status') }}</th>
                                <th>{{ __('general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td class="status">
                                        @if($category->is_active)
                                            <span class="badge bg-primary">{{ __('general.active') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ __('general.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        @hasPermissionTo('view_categories')
                                        <a href="{{ route('backend.categories.show', ['category' => $category->id]) }}" class="fs-5 ms-2">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        @endhasPermissionTo

                                        @hasPermissionTo('edit_categories')
                                        <a href="{{ route('backend.categories.edit', ['category' => $category->id]) }}" class="fs-5 ms-2">
                                            <i class="bi bi-pen-fill"></i>
                                        </a>
                                        @endhasPermissionTo

                                        @hasPermissionTo('delete_categories')
                                        <form action="{{ route('backend.categories.delete', ['category' => $category->id]) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('{{ __('general.delete_confirmation') }}');">
                                            @csrf
                                            @method('DELETE')

                                            <a href="javascript:void(0);" class="fs-5 ms-2" onclick="$(this).parent().submit();">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </form>
                                        @endhasPermissionTo
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @include('backend.partials.pagination', ['data' => $categories])
                    </div>
                @else
                    <p class="text-center mt-3">{{ __('general.no_results_found') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

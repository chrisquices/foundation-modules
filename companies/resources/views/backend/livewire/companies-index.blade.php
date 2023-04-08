<div>
    <div x-data="{ show: false }">
        <div class="row">

            @include('backend.partials.searchbar')

            @hasPermissionTo('create_companies')
            <div class="col-lg-8 mb-4">
                <a href="{{ route('backend.companies.create') }}" class="btn btn-primary btn-create float-end fw-bold">{{ __('general.create_company') }}</a>
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
                @if($companies->total() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover datatable mb-4">
                            <thead>
                            <tr>
                                <th>{{ __('general.name') }}</th>
                                <th>{{ __('general.email') }}</th>
                                <th>{{ __('general.website') }}</th>
                                <th>{{ __('general.status') }}</th>
                                <th>{{ __('general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->webiste }}</td>
                                    <td class="status">
                                        @if($company->is_active)
                                            <span class="badge bg-primary">{{ __('general.active') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ __('general.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        @hasPermissionTo('view_companies')
                                        <a href="{{ route('backend.companies.show', ['company' => $company->id]) }}" class="fs-5 ms-2">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        @endhasPermissionTo

                                        @hasPermissionTo('edit_companies')
                                        <a href="{{ route('backend.companies.edit', ['company' => $company->id]) }}" class="fs-5 ms-2">
                                            <i class="bi bi-pen-fill"></i>
                                        </a>
                                        @endhasPermissionTo

                                        @hasPermissionTo('delete_companies')
                                        <form action="{{ route('backend.companies.delete', ['company' => $company->id]) }}" method="POST" class="d-inline"
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
                        @include('backend.partials.pagination', ['data' => $companies])
                    </div>
                @else
                    <p class="text-center mt-3">{{ __('general.no_results_found') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

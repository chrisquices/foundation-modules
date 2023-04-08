@extends('backend.layouts.app')
@section('title', __('general.update_category'))
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.categories.update', ['category' => $category->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="name" class="form-label">{{ __('general.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('general.name') }}" value="{{ old('name', $category->name) }}" required>
                        @include('backend.partials.input-validation', ['name' => 'name'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="photo" class="form-label">{{ __('general.photo') }}</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg, image/png">
                        @include('backend.partials.input-validation', ['name' => 'photo'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="is_active" class="form-label">{{ __('general.status') }}</label>
                        <select name="is_active" id="is_active" class="form-select" required>
                            <option value="1" @selected(old('is_active', $category->is_active) == '1')>{{ __('general.active') }}</option>
                            <option value="0" @selected(old('is_active', $category->is_active) == '0')>{{ __('general.inactive') }}</option>
                        </select>
                        @include('backend.partials.input-validation', ['name' => 'is_active'])
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary w-md me-3">{{ __('general.update_category') }}</button>
                        <a href="{{ route('backend.categories.index') }}" class="btn btn-outline-primary w-md">{{ __('general.cancel') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

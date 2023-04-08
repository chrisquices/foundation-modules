@extends('backend.layouts.app')
@section('title', __('general.create_company'))
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.companies.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="name" class="form-label">{{ __('general.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('general.name') }}" value="{{ old('name') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'name'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="description" class="form-label">{{ __('general.description') }}</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="{{ __('general.description') }}" value="{{ old('description') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'description'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="email" class="form-label">{{ __('general.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('general.email') }}" value="{{ old('email') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'email'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="telephone" class="form-label">{{ __('general.telephone') }}</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="{{ __('general.telephone') }}" value="{{ old('telephone') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'telephone'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="address" class="form-label">{{ __('general.address') }}</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="{{ __('general.address') }}" value="{{ old('address') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'address'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="website" class="form-label">{{ __('general.website') }}</label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="{{ __('general.website') }}" value="{{ old('website') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'website'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="photo" class="form-label">{{ __('general.photo') }}</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg, image/png">
                        @include('backend.partials.input-validation', ['name' => 'photo'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="banner" class="form-label">{{ __('general.banner') }}</label>
                        <input type="file" class="form-control" id="banner" name="banner" accept="image/jpeg, image/png">
                        @include('backend.partials.input-validation', ['name' => 'banner'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="is_active" class="form-label">{{ __('general.status') }}</label>
                        <select name="is_active" id="is_active" class="form-select" required>
                            <option value="1" @selected(old('is_active') == '1')>{{ __('general.active') }}</option>
                            <option value="0" @selected(old('is_active') == '0')>{{ __('general.inactive') }}</option>
                        </select>
                        @include('backend.partials.input-validation', ['name' => 'is_active'])
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary w-md me-3">{{ __('general.create_company') }}</button>
                        <a href="{{ route('backend.companies.index') }}" class="btn btn-outline-primary w-md">{{ __('general.cancel') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

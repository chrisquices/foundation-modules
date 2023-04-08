@extends('backend.layouts.app')
@section('title', __('general.create_nationality'))
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('backend.nationalities.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="name" class="form-label">{{ __('general.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('general.name') }}" value="{{ old('name') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'name'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="code" class="form-label">{{ __('general.code') }}</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="{{ __('general.code') }}" value="{{ old('code') }}" required>
                        @include('backend.partials.input-validation', ['name' => 'code'])
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="photo" class="form-label">{{ __('general.photo') }}</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg, image/png">
                        @include('backend.partials.input-validation', ['name' => 'photo'])
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
                        <button class="btn btn-primary w-md me-3">{{ __('general.create_nationality') }}</button>
                        <a href="{{ route('backend.nationalities.index') }}" class="btn btn-outline-primary w-md">{{ __('general.cancel') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

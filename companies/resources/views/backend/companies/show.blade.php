@extends('backend.layouts.app')
@section('title', __('general.view_company'))
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">{{ __('general.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $company->name ?? '-' }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="description" class="form-label">{{ __('general.description') }}</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $company->description ?? '-' }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="email" class="form-label">{{ __('general.email') }}</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $company->email ?? '-' }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="telephone" class="form-label">{{ __('general.telephone') }}</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $company->telephone ?? '-' }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="address" class="form-label">{{ __('general.address') }}</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $company->address ?? '-' }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="website" class="form-label">{{ __('general.website') }}</label>
                    <input type="text" class="form-control" id="website" name="website" value="{{ $company->website ?? '-' }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="photo" class="form-label">
                        {{ __('general.photo') }}
                        <span class="text-primary">({{ __('general.click_to_enlarge') }})</span>
                    </label>
                    <br>
                    <a href="{{ $company->photo_url }}" data-lightbox="photo" data-title="{{ __('general.photo') }}">
                        <img src="{{ $company->photo_thumbnail_url }}" alt="photo" class="img-fluid rounded show-img">
                    </a>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="banner" class="form-label">
                        {{ __('general.banner') }}
                        <span class="text-primary">({{ __('general.click_to_enlarge') }})</span>
                    </label>
                    <br>
                    <a href="{{ $company->banner_url }}" data-lightbox="banner" data-title="{{ __('general.banner') }}">
                        <img src="{{ $company->banner_thumbnail_url }}" alt="banner" class="img-fluid rounded show-img">
                    </a>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="is_active" class="form-label">{{ __('general.status') }}</label>
                    <input type="text" class="form-control" id="is_active" name="is_active" value="{{ ($company->is_active) ? __('general.active') : __('general.inactive') }}"
                           disabled>
                </div>

                <div class="col-md-12">
                    <a href="{{ route('backend.companies.index') }}" class="btn btn-outline-primary w-md">{{ __('general.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

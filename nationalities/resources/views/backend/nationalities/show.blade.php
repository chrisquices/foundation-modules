@extends('backend.layouts.app')
@section('title', __('general.view_nationality'))
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="name" class="form-label">{{ __('general.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $nationality->name }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="code" class="form-label">{{ __('general.code') }}</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $nationality->code }}" disabled>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="photo" class="form-label">
                        {{ __('general.photo') }}
                        <span class="text-primary">({{ __('general.click_to_enlarge') }})</span>
                    </label>
                    <br>
                    <a href="{{ $nationality->photo_url }}" data-lightbox="photo" data-title="{{ __('general.photo') }}">
                        <img src="{{ $nationality->photo_thumbnail_url }}" alt="photo" class="img-fluid rounded show-img">
                    </a>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="is_active" class="form-label">{{ __('general.status') }}</label>
                    <input type="text" class="form-control" id="is_active" name="is_active" value="{{ ($nationality->is_active) ? __('general.active') : __('general.inactive') }}"
                           disabled>
                </div>

                <div class="col-md-12">
                    <a href="{{ route('backend.nationalities.index') }}" class="btn btn-outline-primary w-md">{{ __('general.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

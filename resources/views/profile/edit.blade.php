@extends('base-templates.base-templates')

@php
    $overview = '';
    $title = '';
@endphp

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3 row">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <div class="form-group mb-3 row">
                        @include('profile.partials.update-password-form')
                    </div>
                    <div class="form-group mb-3 row">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

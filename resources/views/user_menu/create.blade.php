@extends('base-templates.base-templates')

@php
    $title = 'Add Menu';
@endphp

@section('content')
    <div class="container">
        <div class="col-md-6 mt-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user_menu.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Menu</label>
                            <div class="col">
                                <input type="text"
                                    class="form-control 
                                    @error('menu')
                                      is-invalid
                                    @enderror"
                                    placeholder="Enter menu" name="menu" value="{{ old('menu') }}" required>
                                @error('menu')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

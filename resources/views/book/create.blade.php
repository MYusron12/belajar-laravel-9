@extends('base-templates.base-templates')

@php
    $title = 'Tambah Daftar Buku';
@endphp

@section('content')
    <div class="container">
        <div class="col-md-6 mt-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('book.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Title</label>
                            <div class="col">
                                <input type="text"
                                    class="form-control @error('title')
                                    is-invalid
                                @enderror"
                                    placeholder="Enter title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Writer</label>
                            <div class="col">
                                <input type="text"
                                    class="form-control @error('writer')
                                    is-invalid
                                @enderror"
                                    name="writer" value="{{ old('writer') }}" required>
                                @error('writer')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Publisher</label>
                            <div class="col">
                                <input type="text"
                                    class="form-control @error('publisher')
                                    is-invalid
                                @enderror"
                                    name="publisher" value="{{ old('publisher') }}" required>
                                @error('writer')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Page</label>
                            <div class="col">
                                <input type="text"
                                    class="form-control @error('page')
                                    is-invalid
                                @enderror"
                                    name="page" value="{{ old('page') }}" required>
                                @error('page')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Status</label>
                            <div class="col">
                                <select class="form-select" name="is_publish">
                                    <option value="0">Not Publish</option>
                                    <option value="1">Publish</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Price</label>
                            <div class="col">
                                <input type="number" name="price"
                                    class="form-control @error('price')
                                    is-invalid
                                @enderror"
                                    value="{{ old('price') }}" required>
                                @error('page')
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

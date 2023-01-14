@extends('base-templates.base-templates')

@php
    $title = 'Add User';
@endphp

@section('content')
    <div class="container">
        <div class="col-md-6 mt-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Name</label>
                            <div class="col">
                                <input type="text"
                                    class="form-control 
                              @error('name')
                                is-invalid
                              @enderror"
                                    placeholder="Enter name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Email</label>
                            <div class="col">
                                <input type="text"
                                    class="form-control 
                              @error('email')
                                is-invalid
                              @enderror"
                                    placeholder="Enter email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Image</label>
                            <div class="col">
                                <input type="file"
                                    class="form-control 
                              @error('image')
                                is-invalid
                              @enderror"
                                    name="image" required>
                                @error('image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Password</label>
                            <div class="col">
                                <input type="password"
                                    class="form-control 
                              @error('password')
                                is-invalid
                              @enderror"
                                    placeholder="Enter password" name="password" value="P@ssw0rd123" required>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Role</label>
                            <div class="col">
                                <select name="role_id" id="" class="form-control">
                                    <option value="">Choose Role</option>
                                    @foreach ($role as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="form-label col-3 col-form-label">Active</label>
                            <div class="col">
                                <select name="is_active" id="" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="2">Not Active</option>
                                </select>
                                @error('is_active')
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

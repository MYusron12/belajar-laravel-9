@extends('base-templates.base-templates')

@php
    $title = 'Edit Sub Menu';
@endphp

@section('content')
    <div class="container">
        <div class="col-md-6 mt-2">
            <div class="card">
                <div class="card-body">
                    @foreach ($getData as $userSubMenu)
                        <form action="{{ route('user_sub_menu.update', $userSubMenu->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Menu</label>
                                <div class="col">
                                    <input type="hidden" name="id" value="{{ $userSubMenu->id }}">
                                    <select name="menu_id" id="" class="form-control">
                                        <option value="{{ $userSubMenu->menu_id }}">{{ $userSubMenu->menu }}</option>
                                        @foreach ($menu as $menu)
                                            <option value="{{ $menu->id }}" class="form-control">{{ $menu->menu }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('menu_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Title</label>
                                <div class="col">
                                    <input type="text"
                                        class="form-control 
                                    @error('title')
                                      is-invalid
                                    @enderror"
                                        placeholder="Enter title" name="title"
                                        value="{{ old('title') ?? $userSubMenu->title }}" required>
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">URL</label>
                                <div class="col">
                                    <input type="text"
                                        class="form-control 
                                    @error('url')
                                      is-invalid
                                    @enderror"
                                        placeholder="Enter url" name="url" value="{{ old('url') ?? $userSubMenu->url }}"
                                        required>
                                    @error('url')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Icon</label>
                                <div class="col">
                                    <input type="text"
                                        class="form-control 
                                    @error('icon')
                                      is-invalid
                                    @enderror"
                                        placeholder="Enter icon" name="icon"
                                        value="{{ old('icon') ?? $userSubMenu->icon }}" required>
                                    @error('icon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Active</label>
                                <div class="col">
                                    <select name="is_active" id="" class="form-control">
                                        <option value="{{ $userSubMenu->is_active }}">
                                            @if ($userSubMenu->is_active == 1)
                                                Active
                                            @else
                                                Not Active
                                            @endif
                                        </option>
                                        <option value="0">Not Active</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-footer">
                                <input type="submit" class="btn btn-primary" value="Ubah">
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

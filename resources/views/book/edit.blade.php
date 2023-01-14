@extends('base-templates.base-templates')

@php
    $title = 'Edit Books';
@endphp

@section('content')
    <div class="container">
        <div class="col-md-6 mt-2">
            <div class="card">
                <div class="card-body">
                    @foreach ($booksId as $book)
                        <form action="{{ route('book.update', $book->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $book->id }}">
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Title</label>
                                <div class="col">
                                    <input type="text"
                                        class="form-control @error('title')
                              is-invalid
                          @enderror"
                                        placeholder="Enter title" name="title" value="{{ old('title') ?? $book->title }}"
                                        required>
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
                                        name="writer" value="{{ old('writer') ?? $book->writer }}" required>
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
                                        name="publisher" value="{{ old('publisher') ?? $book->publisher }}" required>
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
                                        name="page" value="{{ old('page') ?? $book->page }}" required>
                                    @error('page')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Status</label>
                                <div class="col">
                                    <select class="form-select" name="is_publish">
                                        <option value="{{ $book->is_publish }}">
                                            @if ($book->is_publish == 1)
                                                Publish
                                            @else
                                                Not Publish
                                            @endif
                                        </option>
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
                                        value="{{ old('price') ?? $book->price }}" required>
                                    @error('page')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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

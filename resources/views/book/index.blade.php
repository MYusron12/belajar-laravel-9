@extends('base-templates.base-templates')

@push('session-alert')
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
@endpush

@php
    $title = 'Daftar Buku';
@endphp

@push('button-add')
    <a href="{{ route('book.create') }}" class="btn btn-primary">
        Add New
    </a>
@endpush

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Write</th>
                                <th>Publisher</th>
                                <th>Page</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{ $books->firstItem() + $key }}</td>
                                    <td>{{ $book->title }}
                                    </td>
                                    <td>
                                        {{ $book->writer }}
                                    </td>
                                    <td>
                                        {{ $book->publisher }}
                                    </td>
                                    <td>
                                        {{ $book->page }}
                                    </td>
                                    <td>
                                        @if ($book->is_publish == 1)
                                            Publish
                                        @else
                                            Not Publish
                                        @endif
                                    </td>
                                    <td>{{ $book->price }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Hapus"
                                                onclick="return confirm('Apakah akan dihapus?')" class="btn btn-danger">
                                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-success">Edit</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right mt-2">
                        {{ $books->firstItem() }}
                        to
                        {{ $books->lastItem() }}
                        of
                        {{ $resultTotalBooks . ' Page' }}
                    </div>
                    <div class="float-end">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('base-templates.base-templates')

@push('session-alert')
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
@endpush

@push('button-add')
    <a href="{{ route('user_menu.create') }}" class="btn btn-primary">
        Add New
    </a>
@endpush

@php
    $title = 'List Menu';
@endphp

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Menu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($user_menu as $key => $menu)
                                <tr>
                                    <td>{{ $user_menu->firstItem() + $key }}</td>
                                    <td>{{ $menu->menu }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('user_menu.destroy', $menu->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Hapus"
                                                onclick="return confirm('Apakah akan dihapus?')" class="btn btn-danger">
                                            <a href="{{ route('user_menu.edit', $menu->id) }}" class="btn btn-success">Edit
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end">
                        {{ $user_menu->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

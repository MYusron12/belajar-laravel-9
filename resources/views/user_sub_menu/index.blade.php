@extends('base-templates.base-templates')

@push('session-alert')
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
@endpush

@push('button-add')
    <a href="{{ route('user_sub_menu.create') }}" class="btn btn-primary">
        Add New
    </a>
@endpush

@php
    $title = 'User Sub Menu';
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
                                <th>Title</th>
                                <th>Url</th>
                                <th>Icon</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($getMenu as $key => $userSubMenu)
                                <tr>
                                    <td>{{ $getMenu->firstItem() + $key }}</td>
                                    <td>{{ $userSubMenu->menu }}</td>
                                    <td>{{ $userSubMenu->title }}</td>
                                    <td>{{ $userSubMenu->url }}</td>
                                    <td>{{ $userSubMenu->icon }}</td>
                                    <td>
                                        {{ $userSubMenu->is_active == 1 ? 'Active' : 'Not Active' }}
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('user_sub_menu.destroy', $userSubMenu->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Hapus"
                                                onclick="return confirm('Apakah akan dihapus?')" class="btn btn-danger">
                                            <a href="{{ route('user_sub_menu.edit', $userSubMenu->id) }}"
                                                class="btn btn-success">Edit
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end">
                        {{ $getMenu->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

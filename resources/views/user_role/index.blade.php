@extends('base-templates.base-templates')

@push('session-alert')
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
@endpush

@php
    $title = 'List User Role';
@endphp

@push('button-add')
    <a href="{{ route('user_role.create') }}" class="btn btn-primary">
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
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($user_role as $key => $role)
                                <tr>
                                    <td>{{ $user_role->firstItem() + $key }}</td>
                                    <td>{{ $role->role }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('user_role.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Hapus"
                                                onclick="return confirm('Apakah akan dihapus?')" class="btn btn-danger">
                                            <a href="{{ route('user_role.edit', $role->id) }}" class="btn btn-success">Edit
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end">
                        {{ $user_role->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

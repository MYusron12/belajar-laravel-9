@extends('base-templates.base-templates')

@push('session-alert')
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
@endpush

@php
    $title = 'List Users';
@endphp

@push('button-add')
    <a href="{{ route('user.create') }}" class="btn btn-primary">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($user as $key => $u)
                                <tr>
                                    <td>{{ $user->firstItem() + $key }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $u->image) }}" alt="" width="40px">
                                    </td>
                                    <td>{{ $u->role }}</td>
                                    <td>
                                        @if ($u->is_active == 1)
                                            Active
                                        @else
                                            Not Active
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('user.destroy', $u->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Hapus"
                                                onclick="return confirm('Apakah akan dihapus?')" class="btn btn-danger">
                                            <a href="{{ route('user.edit', $u->id) }}" class="btn btn-success">Edit
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end">
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

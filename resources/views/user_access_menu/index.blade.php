@extends('base-templates.base-templates')

@push('session-alert')
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif
@endpush

@php
    $title = 'List User Access Menu';
@endphp

@push('button-add')
    <a href="{{ route('user_access_menu.create') }}" class="btn btn-primary">
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
                                <th>User</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($user as $key => $userAccessMenu)
                                <tr>
                                    <td>{{ $user->firstItem() + $key }}</td>
                                    <td>{{ $userAccessMenu->name }}</td>
                                    <td>{{ $userAccessMenu->role }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('user_access_menu.show', $userAccessMenu->id) }}"
                                            class="btn btn-success">View
                                            Access</a>
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

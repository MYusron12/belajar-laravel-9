@extends('base-templates.base-templates')

@php
    $title = 'Detail User Access';
@endphp

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                @foreach ($userId as $userId)
                    <h3 class="card-title">Nama user : {{ $userId->name }}</h3>
                @endforeach
            </div>
            @php
                $id = Auth::user()->id;
                $role_id = Auth::user()->role_id;
                $cekMenu = DB::table('users')
                    ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
                    ->join('user_access_menus', 'user_access_menus.role_id', '=', 'user_roles.id')
                    ->join('user_menus', 'user_access_menus.menu_id', '=', 'user_menus.id')
                    ->where('users.id', $id)
                    ->select('user_menus.menu')
                    ->get();
                // dd($cekMenu);
            @endphp
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    @foreach ($menu as $m)
                        <div class="row align-items-center">
                            <div class="col-auto"><input type="checkbox" class="form-check-input"></div>
                            <div class="col text-truncate">
                                <a href="#" class="text-body d-block"><span
                                        class="badge bg-blue">{{ $m->menu }}</span></a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

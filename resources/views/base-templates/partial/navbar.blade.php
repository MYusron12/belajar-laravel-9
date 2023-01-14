{{-- navbar --}}
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    @php
                        $id = Auth::user()->role_id;
                        // dd($id);
                        $queryMenu = DB::select('select user_menus.id, menu from user_menus join user_access_menus on user_menus.id=user_access_menus.menu_id where user_access_menus.role_id=' . $id . ' order by user_access_menus.menu_id desc');
                        // dd($queryMenu);
                    @endphp
                    @foreach ($queryMenu as $menu)
                        @php
                            $menuId = $menu->id;
                            $querySubMenu = DB::select('select * from user_sub_menus join user_menus on user_sub_menus.menu_id=user_menus.id where user_sub_menus.menu_id=' . $menuId . ' and user_sub_menus.is_active=1');
                            // dd($menuId);
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" role="button" aria-expanded="">
                                {{ $menu->menu }}
                            </a>
                            <div class="dropdown-menu">
                                @foreach ($querySubMenu as $subMenu)
                                    <a href="{{ $subMenu->url }}" class="dropdown-item">{{ $subMenu->title }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

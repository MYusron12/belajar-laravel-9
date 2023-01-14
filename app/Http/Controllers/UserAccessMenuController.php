<?php

namespace App\Http\Controllers;

use App\Models\UserAccessMenu;
use App\Http\Requests\StoreUserAccessMenuRequest;
use App\Http\Requests\UpdateUserAccessMenuRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Myhelper;
use Illuminate\Http\Response;

class UserAccessMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = DB::table('users')
            ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
            ->select('users.*', 'user_roles.role')
            ->simplePaginate(5);
        $data = DB::table('user_access_menus')
            ->join('user_roles', 'user_access_menus.role_id', '=', 'user_roles.id')
            ->join('user_menus', 'user_access_menus.menu_id', '=', 'user_menus.id')
            ->select('user_access_menus.*', 'user_roles.role', 'user_menus.menu')
            ->simplePaginate(5);
        return view('user_access_menu.index', [
            'user' => $user,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserAccessMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserAccessMenuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAccessMenu  $userAccessMenu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = DB::select('select * from users where id=?', [$id]);
        $menu = DB::select('select * from user_menus');
        return view('user_access_menu.access', [
            'userId' => $userId,
            'menu' => $menu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAccessMenu  $userAccessMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAccessMenu $userAccessMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserAccessMenuRequest  $request
     * @param  \App\Models\UserAccessMenu  $userAccessMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserAccessMenuRequest $request, UserAccessMenu $userAccessMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAccessMenu  $userAccessMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAccessMenu $userAccessMenu)
    {
        //
    }
}

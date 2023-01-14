<?php

namespace App\Http\Controllers;

use App\Models\UserSubMenu;
use App\Http\Requests\StoreUserSubMenuRequest;
use App\Http\Requests\UpdateUserSubMenuRequest;

use Illuminate\Support\Facades\DB;

class UserSubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_sub_menu = DB::select('select * from user_sub_menus');
        // $getMenu = DB::select('select a.*,b.menu from user_sub_menus a join user_menus b on a.menu_id=b.id');
        $getMenu = DB::table('user_sub_menus')
            ->join('user_menus', 'user_sub_menus.menu_id', '=', 'user_menus.id')
            ->select('user_sub_menus.*', 'user_menus.menu')->simplePaginate(5);
        // dd($getMenu);
        return view('user_sub_menu.index', [
            'user_sub_menu' => $user_sub_menu,
            'getMenu' => $getMenu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = DB::select('select * from user_menus');
        return view('user_sub_menu.create', [
            'menu' => $menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserSubMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserSubMenuRequest $request)
    {
        $data  = $request->validate([
            'menu_id' => ['required'],
            'title' => ['required'],
            'url' => ['required'],
            'icon' => ['required'],
            'is_active' => ['numeric']
        ]);
        // dd($data);
        DB::insert('insert into user_sub_menus(menu_id, title, url, icon, is_active) values(?,?,?,?,?)', [$data['menu_id'], $data['title'], $data['url'], $data['icon'], $data['is_active']]);
        return redirect()->route('user_sub_menu.index')->with('success', 'Data has been insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSubMenu  $userSubMenu
     * @return \Illuminate\Http\Response
     */
    public function show(UserSubMenu $userSubMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSubMenu  $userSubMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSubMenu $userSubMenu)
    {
        // $id = $userSubMenu->id;
        $menu = DB::select('select * from user_menus');
        // $getData = DB::table('user_sub_menus')
        //     ->join('user_menus', 'user_sub_menus.menu_id', '=', 'user_menus.id')
        //     ->where('user_sub_menus.id', 9)
        //     ->select('user_sub_menus.*', 'user_menus.menu');

        $getData = DB::select('select user_sub_menus.*, user_menus.menu from user_sub_menus join user_menus on user_sub_menus.menu_id=user_menus.id where user_sub_menus.id=?', [$userSubMenu->id]);
        // dd($getData);
        return view('user_sub_menu.edit', [
            'getData' => $getData,
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserSubMenuRequest  $request
     * @param  \App\Models\UserSubMenu  $userSubMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserSubMenuRequest $request, UserSubMenu $userSubMenu)
    {
        // dd($userSubMenu);
        $data = $request->validate([
            'menu_id' => ['required'],
            'title' => ['required'],
            'url' => ['required'],
            'icon' => ['required'],
            'is_active' => ['required']
        ]);
        // dd($data);
        DB::update('update user_sub_menus set menu_id=?, title=?, url=?, icon=?, is_active=? where id=?', [
            $data['menu_id'], $data['title'], $data['url'], $data['icon'], $data['is_active'], $userSubMenu->id
        ]);
        return redirect()->route('user_sub_menu.index')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSubMenu  $userSubMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSubMenu $userSubMenu)
    {
        DB::delete('delete from user_sub_menus where id=?', [$userSubMenu->id]);
        return redirect()->route('user_sub_menu.index')->with('success', 'Data has been deleted');
    }
}

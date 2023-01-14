<?php

namespace App\Http\Controllers;

use App\Models\UserMenu;
use App\Http\Requests\StoreUserMenuRequest;
use App\Http\Requests\UpdateUserMenuRequest;
use Illuminate\Support\Facades\DB;

class UserMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_menu = DB::table('user_menus')->select('*')->simplePaginate(5);
        return view('user_menu.index', [
            'user_menu' => $user_menu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserMenuRequest $request)
    {
        $data = $request->validate([
            'menu' => ['required']
        ]);
        DB::insert('insert into user_menus(menu) values(?)', [$data['menu']]);
        return redirect()->route('user_menu.index')->with('success', 'Data has been save');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserMenu  $userMenu
     * @return \Illuminate\Http\Response
     */
    public function show(UserMenu $userMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserMenu  $userMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(UserMenu $userMenu)
    {
        $userMenu = DB::select('select * from user_menus where id=?', [$userMenu->id]);
        return view('user_menu.edit', [
            'userMenu' => $userMenu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserMenuRequest  $request
     * @param  \App\Models\UserMenu  $userMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserMenuRequest $request, UserMenu $userMenu)
    {
        $data = $request->validate([
            'menu' => ['required']
        ]);
        DB::update('update user_menus set menu=? where id=?', [$data['menu'], $userMenu->id]);
        return redirect()->route('user_menu.index')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserMenu  $userMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMenu $userMenu)
    {
        DB::delete('delete from user_menus where id=?', [$userMenu->id]);
        return redirect()->route('user_menu.index')->with('success', 'Data has been delete');
    }
}

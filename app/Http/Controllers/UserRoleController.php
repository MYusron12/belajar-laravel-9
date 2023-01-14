<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Http\Requests\StoreUserRoleRequest;
use App\Http\Requests\UpdateUserRoleRequest;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role = DB::table('user_roles')->select('*')->simplePaginate(5);
        return view('user_role.index', [
            'user_role' => $user_role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRoleRequest $request)
    {
        $data = $request->validate([
            'role' => ['required']
        ]);
        DB::insert('insert into user_roles(role) values(?)', [$data['role']]);

        return redirect()->route('user_role.index')->with('success', 'Data has been save');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $userRole)
    {

        $userRoleId = DB::select('select * from user_roles where id = ?', [$userRole->id]);
        return view('user_role.edit', [
            'userRoleId' => $userRoleId
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRoleRequest  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRoleRequest $request, UserRole $userRole)
    {
        $data = $request->validate([
            'role' => ['required']
        ]);
        DB::update('update user_roles set role=? where id=?', [$data['role'], $userRole->id]);
        return redirect()->route('user_role.index')->with('success', 'Data has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $userRole)
    {
        DB::delete('delete from user_roles where id=?', [$userRole->id]);
        return redirect()->route('user_role.index')->with('success', 'Data has been deleted');
    }
}

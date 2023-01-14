<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = DB::select('select * from user_roles');
        $user = DB::table('users')
            ->join('user_roles', 'users.role_id', '=', 'user_roles.id')
            ->select('users.*', 'user_roles.role')->simplePaginate(5);
        return view('user.index', [
            'user' => $user,
            'role' => $role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = DB::select('select * from user_roles');
        return view('user.create', [
            'role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'image' => ['required', 'mimes:jpeg,png,jpg,gif'],
            'password' => ['required'],
            'role_id' => ['required'],
            'is_active' => ['required']
        ]);
        $imgPath = $request->file('image')->store('img', 'public');
        $passwordHash = Hash::make($request->password);
        // dd($passwordHash);
        DB::insert('insert into users(name, email, image, password, role_id, is_active) values(?,?,?,?,?,?)', [$data['name'], $data['email'], $imgPath, $passwordHash, $data['role_id'], $data['is_active']]);

        return redirect()->route('user.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from users where id=?', [$id]);
        return redirect()->route('user.index')->with('success', 'Data has been deleted');
    }
}

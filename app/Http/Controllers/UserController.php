<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::with('roles')->get();

        return view('layers.user.index',['active'=>['user', 'data_user'], 'datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('layers.user.form',['roles' => $roles, 'user' => null, 'active' => ['user', 'data_user']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array',
        ], [
            'username.unique' => 'Username telah digunakan',
            'email.unique' => 'Email telah digunakan',
            'password.min' => 'Password minimal 8 digit',
            'password.confirmed' => 'Kolom konfirmasi password tidak sama dengan password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['email_verified_at'] = now();
        $validatedData['remember_token'] =  Str::random(10);

        $user = User::create($validatedData);
        $user->assignRole($validatedData['roles']);
        $rolesString = implode('', $request->roles);

        Alert::success('Sukses!', 'Data user ' . $validatedData['username'] . ' yang berperan sebagai ' . $rolesString . ' berhasil ditambahkan');
        return Redirect::to('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name')->toArray();
        return view('layers.user.form', compact('user', 'roles', 'userRoles'), ['active'=>['user', 'data_user']]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'roles' => 'required|array',
        ], [
            'username.unique' => 'Username telah digunakan',
            'email.unique' => 'Email telah digunakan',
        ]);


        $user->update($validatedData);
        $user->syncRoles($request->roles);
        $rolesString = implode('', $request->roles);

        Alert::success('Sukses!', 'Data user ' . $validatedData['username'] . ' yang berperan sebagai ' . $rolesString . ' berhasil diperbarui');
        return Redirect::to('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);        
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}

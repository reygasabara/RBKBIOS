<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('layers.roles.index', compact('roles'), ['active'=>['user', 'roles']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('layers.roles.form', compact('permissions'), ['active'=>['user', 'roles']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->role]);
        $role->syncPermissions($request->permissions);

        Alert::success('Sukses!', 'Peran ' . $request->role . ' berhasil ditambahkan');
        return Redirect::to('/roles');
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
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('layers.roles.form', compact('role', 'permissions', 'rolePermissions'), ['active'=>['user', 'roles']]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);
    
        $role->name = $request->role;
        $role->save();
        $role->syncPermissions($request->permissions);
    
        Alert::success('Sukses!', 'Peran ' . $request->role . ' berhasil diperbarui');
        return Redirect::to('/roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Role::destroy($role->id);        
        alert()->success('Sukses!','Peran berhasil dihapus!');
        return redirect()->back();
    }
}

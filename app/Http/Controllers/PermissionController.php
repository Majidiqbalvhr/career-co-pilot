<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::get();
        return view('role-permissions.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permissions.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
//        $role = Role::create(['name' => 'writer']);
        $permission = Permission::create([
            'name' => $request->name,
        ]);
        return redirect('permissions')->with('status','permission Created successfully');

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
    public function edit(Permission $permission)
    {
        return view('role-permissions.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
//        $role = Role::create(['name' => 'writer']);
        $permission = $permission->update([
            'name' => $request->name,
        ]);
        return redirect('permissions')->with('status','permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect('permissions')->with('status', 'Permission deleted successfully.');
    }
    public function PermissionsUpdate(Request $request)
    {
        $role = Role::find($request->id);
        $role->syncPermissions($request->permission);
        return back()->with('status','Permissions Updated');

    }
}

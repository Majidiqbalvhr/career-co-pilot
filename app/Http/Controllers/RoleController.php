<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('role-permissions.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permissions.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
//        $role = Role::create(['name' => 'writer']);
        $role = Role::create([
            'name' => $request->name,
        ]);
        return redirect('roles')->with('status','Role Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);
        if(!empty($role))
        {
            $allpermissions=Permission::get();
            $permissions=$role->permissions->pluck('name');

            foreach ($allpermissions as $permission) {
                if ($permissions->contains($permission->name)) {
                    $permission->isAvailable = "Yes";

                } else {
                    $permission->isAvailable = "No";
                }

            }
            return view('role-permissions.roles.role_has_permission', compact('role','allpermissions'));
        }
        else
            abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('role-permissions.roles.edit',compact('role'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        $role = $role->update([
            'name' => $request->name,
        ]);
        return redirect('roles')->with('status','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('roles')->with('status', 'Role deleted successfully.');
    }
}

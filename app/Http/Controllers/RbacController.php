<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RbacController extends Controller
{
    public function index()
    {
        $users = User::with('roles', 'permissions')->get();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('rbac.index', compact('users', 'roles', 'permissions'));
    }

    public function update(Request $request)
    {
        foreach ($request->permissions as $roleId => $perms) {
        $role = Role::find($roleId);
        if ($role) {
            $syncPermissions = [];

            foreach ($perms as $permissionId => $value) {
                $permission = Permission::find($permissionId);
                if ($permission) {
                    $syncPermissions[] = $permission->name;
                }
            }

            $role->syncPermissions($syncPermissions);
        }
    }

    return redirect()->route('rbac.index')->with('success', 'Permissions updated successfully!');
    }
}

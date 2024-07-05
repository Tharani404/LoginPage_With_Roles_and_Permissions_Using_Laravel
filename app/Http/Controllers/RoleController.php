<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:update role', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
        $this->middleware('permission:create role', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole']]);
        $this->middleware('permission:view role', ['only' => ['index']]);
    }

    


    public function index()
    {
        $roles = Role::get(); //$roles=db roles name 
        return view('roles-permissions-users.role.indexrole',[
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('roles-permissions-users.role.createrole');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);
    
        Role::create([
            'name' => $request->name
        ]);
    
        return redirect('roles')->with('success', 'Role Created Successfully.');
    }

    public function edit(Role $role)
    {
        return view('roles-permissions-users.role.editrole',[
            'role' => $role
        ]);

    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' .$role->id
            ] 
        ]);

        $role->update([
            'name' => $request->name
        ]);
    
        return redirect('roles')->with('success', 'Role Update Successfully.');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role -> delete();
        return redirect('roles')->with('success', 'Role Deleted Successfully.');

    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                        ->where('role_has_permissions.role_id' ,$role->id)
                        ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                        ->all();

        return view('roles-permissions-users.role.add-permissions',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('success' , 'Permission Added to Role');
        
    }
}

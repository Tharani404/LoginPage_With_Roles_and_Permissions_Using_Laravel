<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class CrudPermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:update permission', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete permission', ['only' => ['destroy']]);
        $this->middleware('permission:create permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:view permission', ['only' => ['index']]);
    }


    public function index()
    {
        $permissions = Permission::get();
        return view('roles-permissions-users.crudpermission.index',[
            'permissions' => $permissions
        ]);
    }

    public function create()
    {
        return view('roles-permissions-users.crudpermission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);
    
        Permission::create([
            'name' => $request->name
        ]);
    
        return redirect('permissions')->with('success', 'Permission Created Successfully.');
    }

    public function edit(Permission $permission)
    {
        return view('roles-permissions-users.crudpermission.edit',[
            'permission' => $permission
        ]);

    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,' .$permission->id
            ] 
        ]);

        $permission->update([
            'name' => $request->name
        ]);
    
        return redirect('permissions')->with('success', 'Permission Update Successfully.');
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission -> delete();
        
        return redirect('permissions')->with('success', 'Permission Deleted Successfully.');

    }
}

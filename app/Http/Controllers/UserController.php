<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:update user', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
        $this->middleware('permission:create user', ['only' => ['create', 'store']]);
        $this->middleware('permission:view user', ['only' => ['index']]);
    }


    public function index()
    {
        $users = User::get();
        return view('roles-permissions-users.users.indexuser',[
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('roles-permissions-users.users.createuser',[
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);

        $user->syncRoles($request->roles);

        return redirect('/users')->with('success', 'User Created successfully with roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('roles-permissions-users.users.edituser',[
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password))
        {
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user -> update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('success', 'User Updated successfully with roles');
    }


    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/users')->with('success', 'User deleted successfully');

    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UserManagementController extends Controller
{
    //

    public function index()
    {
        return view('admin.management.user');
    }

    public function getRoles()
    {
        $roles = User::with('roles')->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'superadministrator');
        })->get();
        return response()->json($roles);
    }

    public function selectRole()
    {
        $roles = Role::where('name', '!=', 'superadministrator')->select('name', 'display_name')->get();

        return response()->json($roles->toArray());
    }

    public function createUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:100', 'regex:/^[\pL\pN\s\p{P}]+$/u'],
            'email' => ['required', 'email', 'unique:users,email,'],
            'phonenumber' => ['required', 'regex:/^(09|\+639)[0-9]{9,9}$/'],
            'address' => ['required', 'string'],
            'status' => ['required', 'in:active,inactive'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'status' => $request->status,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole($request->role);

        return response()->json(['status' => true]);
    }

    public function findUser(Request $request)
    {
        $user = User::with('roles')->where('id', $request->id)->first();

        return response()->json($user->toArray());
    }

    public function updateUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:100', 'regex:/^[\pL\pN\s\p{P}]+$/u'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($request->id)],
            'phonenumber' => ['required', 'regex:/^(09|\+639)[0-9]{9,9}$/'],
            'address' => ['required', 'string'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $user = User::findOrFail($request->id);

        if ($user->roles->pluck('name')->count() < 1) {
            $user->attachRole($request->role);
        } else {
            $currentRole = $user->roles->pluck('name')->first();
            $user->syncRoles([$request->role]);
        }

        $user->update($validatedData);

        return response()->json(['status' => true]);
    }
}

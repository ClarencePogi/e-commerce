<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PrivilegeManagementController extends Controller
{
    public function index()
    {
        return view('admin.management.privilge');
    }

    public function createPrivilege(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:4', 'max:50', 'unique:roles,name'],
            'display_name' => ['required', 'min:4', 'max:50', 'unique:roles,display_name'],
            'description' => ['nullable', 'max:200']
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        $query = Permission::whereIn('name', array_values($request->permissions))->get();

        $role->attachPermissions($query->toArray());

        return response()->json(['status' => true]);
    }

    public function getPrivileges()
    {
        $privilege = Role::with('permissions')->get();

        return response()->json($privilege->toArray());
    }

    public function findPrivilege(Request $request)
    {
        $role = Role::where('id', $request->id)->with('permissions')->first();


        return response()->json($role->toArray());
    }

    public function getPermissions() {
        $permissions = Permission::all();

        return response()->json( $permissions);
    }

    public function updatePrivilege(Request $request) {
        $validatedData = $request->validate([
            "name" => ['required', 'string', Rule::unique('roles')->ignore($request->id)],
            "display_name" => ['required', 'string', Rule::unique('roles')->ignore($request->id)],
            "description" => ['nullable', 'string']
        ]);

        $role = Role::findOrFail($request->id);

        $role->update($validatedData);

        $role->syncPermissions($request->permissions);

        return response()->json(['status' => true]);
    }

    public function deleteRole(Request $request) {
        $role = Role::findOrFail($request->id);

        $role->permissions()->detach();
        $role->users()->detach();
        $role->delete();

        return response()->json(['status' => true]);
    }
}

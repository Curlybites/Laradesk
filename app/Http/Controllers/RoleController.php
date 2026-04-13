<?php

namespace App\Http\Controllers;

// use App\Models\Role;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = \Spatie\Permission\Models\Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:roles,name',
                'description' => 'nullable|string|max:255',
                'guard_name' => 'in:web,api,admin',
            ]);

            Role::create($validated);

            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while creating the role.']);
        }
    }

    public function edit($id)
    {
        $permissions = \Spatie\Permission\Models\Permission::all();
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:roles,name,' . $id,
                'guard_name' => 'in:web,api,admin',
                'description' => 'nullable|string|max:255',
            ]);
            $role = Role::findOrFail($id);
            $role->update($validated);
            $role->syncPermissions($request->permissions ?? []);

            return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while updating the role.']);
        }
    }
}

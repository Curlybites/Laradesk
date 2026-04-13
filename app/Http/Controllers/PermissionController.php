<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->paginate(10);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'guard_name' => 'in:web,api,admin',
            'description' => 'nullable|string|max:255',
        ]);

        Permission::create($validatedData);
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit()
    {
        $permission = Permission::findOrFail(request()->route('id'));
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request)
    {
        $permission = Permission::findOrFail(request()->route('id'));

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'description' => 'nullable|string|max:255',
        ]);

        $permission->update($validatedData);
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }


}

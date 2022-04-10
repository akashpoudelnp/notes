<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => ['required'],
        ]);

        Permission::create($data);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission created successfully!');
    }

    public function edit(Permission $permission): View
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $request->validate([
            'name'  => ['required'],
        ]);

        $permission->update($request->only(['name']));

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission updated successfully!');
    }
    public function destroy(Permission $permission)
    {
        // $permission->roles()
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success','Permission Deleted Successfully!!');
    }
}

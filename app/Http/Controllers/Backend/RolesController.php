<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles= Role::all();

        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data= $request->validate([

            'name'=>['required','string','unique:roles,name'],
        ]);

        Role::create($data);

        return redirect()->route('admin.roles.index')->with('success','Role Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {

        return view('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        return view('admin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

       $data = $request->validate([
            'name'          => ['required'],
            'permissions.*' => ['required', 'integer', 'exists:permissions,id'],
        ]);

        $role->update($request->only(['name']));



        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success','Role Deleted Sucessfully');
    }
    public function addperm(Role $role)
    {
        $permissions = Permission::all();
        $role_perms = $role->permissions()->get()->pluck('id')->toArray();
        return view('admin.roles.addperm',compact('role','permissions','role_perms'));
    }
    public function storeperm(Request $request, Role $role)
    {
        $request->validate([
            'permissions.*' => ['required', 'integer', 'exists:permissions,id'],
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index')->with('success','Permissions added to role sucessfully');
    }
}

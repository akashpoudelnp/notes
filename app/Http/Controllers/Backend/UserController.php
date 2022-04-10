<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();


       return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.users.create');
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
            'name' => ['required','string'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','string','min:8'],
        ]);

        $data['password']= bcrypt($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')->with('success','User Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $data= $request->validate([
             'name' => ['string'],
            'email' => ['email','unique:users,email,'.$user->id],
            'password' => ['nullable'],
        ]);

        $data['password']= bcrypt($data['password']);

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success','User Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->id == auth()->user()->id? abort(403,"Not Authorized to Perform the task"): $user->delete();

        return redirect()->route('admin.users.index')->with('success','Deleted User Sucessfully!!');
    }
    public function assignrole(User $user)
    {

        $roles= Role::all();

        $user_roles= $user->roles()->pluck('id')->toArray();

        return view('admin.users.assignrole',compact('user','roles','user_roles'));
    }
    public function setRole(Request $request, User $user)
    {
        $request->validate([
            'roles.*' =>['integer','exists:roles,id'],
        ]);



         $user->syncRoles($request->roles);

         return redirect()->route('admin.users.index')->with('success','Roles Updated Sucessfully!!');
    }
}

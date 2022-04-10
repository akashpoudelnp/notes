@extends('admin.master')
@section('title', 'Roles')
@section('header')
    <div class="flex flex-row justify-between">
        <h3>Authorization : Roles</h3>
        <a href="{{ url('admin/roles/create') }}"
            class="my-1 mr-4 rounded-md bg-teal-600 px-2 text-sm text-white hover:bg-teal-500">Add New +</a>
    </div>
@endsection
@section('content')
    <div>
        <table class="h-full w-full rounded-sm bg-white">
            <thead class="rounded-t-md bg-teal-700 text-white">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr class="border-2 border-b-gray-100 text-center">
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @forelse ($role->permissions()->get() as $permission)
                                <span class="mx-1 rounded-lg bg-green-600 p-1 text-xs text-white">
                                    {{ $permission->name }}
                                </span>
    </div>
@empty
    No Permissions
    @endforelse
    </td>
    <div>Home</div>
    <td class="flex flex-row">
        @can('can_assign_roleperm')
            <a href="{{ url("admin/roles/$role->id/permission") }}" class="text-cyan-600"> <i class="fa fa-key"
                    aria-hidden="true"></i></a>
        @endcan

        <a href="{{ url("admin/roles/$role->id/edit") }}" class="px-2 text-cyan-600"><i class="fa fa-pencil"
                aria-hidden="true"></i></a>
        <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
            @method('DELETE')
            @csrf
            <button class="px-2 text-cyan-600"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </form>
    </td>
    </tr>
@empty
    <tr>
        <td colspan="3">
            No Roles
        </td>
    </tr>
    @endforelse
    </tbody>
    </table>
    </div>
@endsection

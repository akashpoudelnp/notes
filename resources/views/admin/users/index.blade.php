@extends('admin.master')
@section('title', 'Users')
@section('header')
    <div class="flex flex-row justify-between">
        <h3>Authentication : Users</h3>
        <a href="{{ url('admin/users/create') }}"
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
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-2 border-b-gray-100 text-center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="my-2">
                            @forelse ($user->getRoleNames() as $role)
                                <small class="mx-1 rounded-md bg-emerald-600 p-1 text-xs text-white"> {{ $role }}
                                </small>
                            @empty
                                No Roles Set
                            @endforelse
                            @can('can_assign_roleperm')
        </div>
        <a class="rounded-md bg-red-900 p-1 text-xs text-white" href="{{ url("admin/user/$user->id/role") }}">
            <i class="fas fa-hammer text-xs"></i>
            Assign role
        </a>
    @endcan
    </td>
    <td class="flex flex-row">
        <a href="{{ url("admin/users/$user->id/edit") }}">✏️</a>
        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
            @method('DELETE')
            @csrf
            <button>🗑️</button>
        </form>
    </td>
    </tr>
@empty
    <tr>
        <td colspan="3">
            No Users
        </td>
    </tr>
    @endforelse
    </tbody>
    </table>
    </div>
@endsection

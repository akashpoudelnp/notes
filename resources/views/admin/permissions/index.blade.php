@extends('admin.master')
@section('title', 'Permissions')
@section('header')
    <div class="flex flex-row justify-between">
        <h3>Authorization : Permissions</h3>
        <a href="{{ url('admin/permissions/create') }}"
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $permission)
                    <tr class="border-2 border-b-gray-100 text-center">
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td class="flex flex-row">
                            <a href="{{ url("admin/permissions/$permission->id/edit") }}">✏️</a>
                            <form method="POST" action="{{ route('admin.permissions.destroy', $permission->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No Permissions
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@extends('admin.master')
@section('title', 'Add Permission')
@section('header', "Authorization: Role - Add Permission ($role->name) ")
@section('content')
    <div class="m-2 flex flex-col">

        <form class="flex flex-col" action="{{ route('admin.storeperm', $role) }}" method="post">
            @csrf
            <span class="text-md font-semibold">Select Permissions</span>
            <hr>
            <div class="box border-2 border-gray-200">
                @forelse ($permissions as $permission)
                    <div class="flex-row p-1">
                        <label for="checkbox">{{ $permission->name }}</label>

                        <input
                            @for ($i = 0; $i < count($role_perms); $i++) @if ($permission->id == $role_perms[$i])
                checked
              @endif @endfor
                            type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="">
                    </div>
                @empty
                    <b>No Permissions Avalilable</b>
                @endforelse
            </div>
            <small class="py-1 text-red-700">
                @error('permission')
                    {{ $message }}
                @enderror
            </small>
            <button class="mt-2 w-1/12 rounded-md bg-red-700 p-1 text-white hover:bg-red-600">Update Permission</button>
        </form>
    </div>
@endsection

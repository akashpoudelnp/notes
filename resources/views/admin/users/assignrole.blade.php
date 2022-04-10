@extends('admin.master')
@section('title', 'Add Role')
@section('header', "Authorization: Role - Add Role to ($user->name) ")
@section('content')
    <div class="m-2 flex flex-col">

        <form class="flex flex-col" action="{{ route('admin.setrole', $user) }}" method="post">
            @csrf
            <span class="text-md font-semibold">Select Role</span>
            <hr>
            <div class="box border-2 border-gray-200">
                @forelse ($roles as $role)
                    <div class="flex-row p-1">
                        <label for="checkbox">{{ $role->name }}</label>

                        <input
                            @for ($i = 0; $i < count($user_roles); $i++) @if ($role->id == $user_roles[$i])
                checked
              @endif @endfor
                            type="checkbox" name="roles[]" value="{{ $role->id }}" id="">
                    </div>
                @empty
                    <b>No Roles Avalilable</b>
                @endforelse
            </div>
            <small class="py-1 text-red-700">
                @error('roles')
                    {{ $message }}
                @enderror
            </small>
            <button class="mt-2 w-1/12 rounded-md bg-red-700 p-1 text-white hover:bg-red-600">Update Role</button>
        </form>
    </div>
@endsection

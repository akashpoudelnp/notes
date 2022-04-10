@extends('admin.master')
@section('title', 'Edit Role')
@section('header', 'Authorization: Role - Edit')
@section('content')
    <div>
        <form class="flex flex-col" action="{{ route('admin.roles.update', $role) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" value="{{ $role->name }}" placeholder="Enter role's name"
                class="my-2 rounded-md border-emerald-600" name="name">
            <small class="py-1 text-red-700">
                @error('name')
                    {{ $message }}
                @enderror
            </small>
            <button class="mt-2 w-1/12 rounded-md bg-red-700 p-1 text-white hover:bg-red-600">Edit</button>
        </form>
    </div>
@endsection

@extends('admin.master')
@section('title', 'Edit Permission')
@section('header', 'Authorization: Permission - Edit')
@section('content')
    <div>
        <form class="flex flex-col" action="{{ route('admin.permissions.update', $permission) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" value="{{ $permission->name }}" placeholder="Enter permission's name"
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

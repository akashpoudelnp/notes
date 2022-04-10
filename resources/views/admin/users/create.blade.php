@extends('admin.master')
@section('title', 'Create User')
@section('header', 'Authentication: User - Create')
@section('content')
    <div>
        <form class="flex flex-col" action="{{ route('admin.users.store') }}" method="post">
            @csrf
            <input type="text" placeholder="Enter user's name" class="my-2 rounded-md border-emerald-600" name="name">
            <small class="py-1 text-red-700">
                @error('name')
                    {{ $message }}
                @enderror
            </small>
            <input type="email" placeholder="Enter user's email" class="my-2 rounded-md border-emerald-600" name="email">
            <small class="py-1 text-red-700">
                @error('email')
                    {{ $message }}
                @enderror
            </small>
            <input autocomplete="new-password" type="password" placeholder="Enter user's password"
                class="my-2 rounded-md border-emerald-600" name="password">
            <small class="py-1 text-red-700">
                @error('password')
                    {{ $message }}
                @enderror
            </small>
            <button class="mt-2 w-1/12 rounded-md bg-red-700 p-1 text-white hover:bg-red-600">Create</button>
        </form>
    </div>
@endsection

@extends('admin.master')
@section('title','Create User')
@section('header','Authentication: User - Create')
@section('content')
    <div>
        <form class="flex flex-col " action="{{route('admin.users.store')}}" method="post">
            @csrf
            <input type="text" placeholder="Enter user's name" class="border-emerald-600 my-2 rounded-md" name="name">
            <small class="py-1 text-red-700">@error('name') {{$message}} @enderror</small>
            <input type="email" placeholder="Enter user's email" class="border-emerald-600 my-2 rounded-md" name="email">
            <small class="py-1 text-red-700">@error('email') {{$message}} @enderror</small>
            <input autocomplete="new-password" type="password" placeholder="Enter user's password" class="border-emerald-600 my-2 rounded-md" name="password">
            <small class="py-1 text-red-700">@error('password') {{$message}} @enderror</small>
            <button class="bg-red-700 text-white p-1 rounded-md hover:bg-red-600 w-1/12 mt-2">Create</button>
        </form>
    </div>
@endsection

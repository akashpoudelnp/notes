@extends('admin.master')
@section('title','Create Role')
@section('header','Authorization: Role - Create')
@section('content')
    <div>
        <form class="flex flex-col " action="{{route('admin.roles.store')}}" method="post">
            @csrf
            <input type="text" placeholder="Enter role's name" class="border-emerald-600 my-2 rounded-md" name="name">
            <small class="py-1 text-red-700">@error('name') {{$message}} @enderror</small>
            <button class="bg-red-700 text-white p-1 rounded-md hover:bg-red-600 w-1/12 mt-2">Create</button>
        </form>
    </div>
@endsection

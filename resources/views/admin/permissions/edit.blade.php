@extends('admin.master')
@section('title','Edit Permission')
@section('header','Authorization: Permission - Edit')
@section('content')
    <div>
        <form class="flex flex-col " action="{{route('admin.permissions.update',$permission)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" value="{{$permission->name}}" placeholder="Enter permission's name" class="border-emerald-600 my-2 rounded-md" name="name">
            <small class="py-1 text-red-700">@error('name') {{$message}} @enderror</small>
            <button class="bg-red-700 text-white p-1 rounded-md hover:bg-red-600 w-1/12 mt-2">Edit</button>
        </form>
    </div>
@endsection

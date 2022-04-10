@extends('admin.master')
@section('title', 'Create Role')
@section('header', 'Authorization: Role - Create')
@section('content')
    <div>
        <form class="flex flex-col" action="{{ route('admin.roles.store') }}" method="post">
            @csrf
            <input type="text" placeholder="Enter role's name" class="my-2 rounded-md border-emerald-600" name="name">
            <small class="py-1 text-red-700">
                @error('name')
                    {{ $message }}
                @enderror
            </small>
            <button class="mt-2 w-1/12 rounded-md bg-red-700 p-1 text-white hover:bg-red-600">Create</button>
        </form>
    </div>
@endsection

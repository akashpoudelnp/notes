@extends('home.master')
@section('content')
    <div class="flex justify-center">
        <h3 class="text-3xl font-bold text-teal-600"> Create Blog</h3>

    </div>

    <hr>
    <div class="mx-4 flex flex-col p-2">
        <form method="POST" action="{{ route('blogs.store') }}" class="flex flex-col rounded-md bg-white p-2 shadow-sm">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="text" name="name" class="my-1 rounded-md border-teal-600" type="text" placeholder="Enter title">
            <small class="py-1 text-red-700">
                @error('name')
                    {{ $message }}
                @enderror
            </small>
            <textarea placeholder="Feel free to let the words flow" name="description" class="my-1 rounded-md border-teal-600" id=""
                cols="30" rows="10"></textarea>
            <small class="py-1 text-red-700">
                @error('description')
                    {{ $message }}
                @enderror
            </small>
            <button class="rounded-md bg-teal-700 p-1 text-white hover:bg-teal-500">Save</button>
        </form>

    </div>
@endsection

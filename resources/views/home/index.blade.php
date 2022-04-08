@extends('home.master')
@section('content')


<div class="flex justify-center">
    <h3  class=" text-3xl text-cyan-600 font-bold"> {{auth()->user()->name}}'s Notes</h3>
    <a class=" ml-1 p-1  rounded-full" href="{{url('create')}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-600" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
          </svg>
    </a>
</div>

<hr>
<div class="flex flex-col mx-4 p-2">
    @forelse ($notes as $note)
    <div class="bg-white p-2 shadow-sm rounded-md flex flex-col my-2 w-auto">
        <b class="">{{$note->name}}</b>
        <p class="p-1">{{$note->description}}</p>
        <span class="text-xs text-gray-600">{{$note->created_at->diffForHumans()}}
            <a href='{{url("/edit/$note->id")}}'>✏️ </a>
            <a href='{{url("/delete/$note->id")}}'>🗑️ </a>
          </span>
    </div>
    @empty
    <div class="bg-white p-2 shadow-sm rounded-md flex flex-col">
        <h2>Empty Canvas</h2>
    </div>
    @endforelse


</div>
@endsection
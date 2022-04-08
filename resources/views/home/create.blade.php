@extends('home.master')
@section('content')


<div class="flex justify-center">
    <h3  class=" text-3xl text-teal-600 font-bold"> Create Note</h3>

</div>

<hr>
<div class="flex flex-col mx-4 p-2">
    <form method="POST" action="{{route('storenote')}}" class="bg-white p-2 shadow-sm rounded-md flex flex-col">
        @csrf
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <input type="text" name="name"  class="my-1  border-teal-600 rounded-md" type="text" placeholder="Enter title">
        <small class="py-1 text-red-700">@error('name') {{$message}} @enderror</small>
        <textarea placeholder="Feel free to let the words flow" name="description" class="my-1  border-teal-600 rounded-md" id="" cols="30" rows="10"></textarea>
        <small class="py-1 text-red-700">@error('description') {{$message}} @enderror</small>
        <button class="p-1 rounded-md bg-teal-700 hover:bg-teal-500 text-white">Save</button>
    </form>

</div>
@endsection
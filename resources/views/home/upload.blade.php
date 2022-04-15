@extends('home.master')
@section('content')
    <div class="flex justify-center">
        <h3 class="text-3xl text-teal-600"> <span class="font-extralight">Start</span> <span
                class="font-bold">Blogging</span></h3>
    </div>

    <hr>
    <div class="flex flex-col">
        <form action="{{ route('supload') }}" enctype="multipart/form-data" method="post">
            @csrf
            <input class="form-input" type="file" name="image" id="">
            <button type="submit">Upload</button>
        </form>
    </div>
@endsection

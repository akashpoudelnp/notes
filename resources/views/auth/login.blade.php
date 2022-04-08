@extends('auth.master')
@section('content')
<div >
    <form action="{{route('login')}}" method="post" style="border-top-width: 26px;" class=" rounded-md bg-white  border-cyan-600 shadow-md border-1 p-12 flex flex-col ">
      <span class="text-2xl text-gray-800 mx-auto"> 📝 | Notes</span>
      <h4 class="text-md text-gray-700 text-center my-4">Login</h4>

        @csrf
    <input type="email" class="my-1  border-teal-600 rounded-md" name="email" type="text" placeholder="Enter your email">
    <small class="py-1 text-red-700">@error('email') {{$message}} @enderror</small>
    <input type="password" class="my-1  border-teal-600 rounded-md" name="password" type="text" placeholder="Enter your password">
    <small class="py-1 text-red-700">@error('password') {{$message}} @enderror</small>

    <button class="p-1 rounded-md bg-cyan-700 hover:bg-cyan-500 text-white">Login</button>
      <a class="text-gray-500 pt-2" href="{{url('register')}}">Dont have an account? <u class="text-cyan-600">Register</u></a>
    </form>


@endsection
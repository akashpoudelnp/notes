@extends('auth.master')
@section('title','Register')

@section('content')
<form method="POST" action="{{route('register')}}" style="border-top-width: 26px;" class=" rounded-md bg-white  border-teal-600 shadow-md border-1 p-12 flex flex-col ">
    @csrf
    <span class="text-2xl text-gray-800 mx-auto"> 📝 | Notes</span>

    <h4 class="text-md text-gray-700 text-center my-4"> Register</h4>
    <input type="text" name="name"  class="my-1  border-teal-600 rounded-md" type="text" placeholder="Enter your name">
    <small class="py-1 text-red-700">@error('name') {{$message}} @enderror</small>
    <input type="email" name="email"  class="my-1  border-teal-600 rounded-md" type="text" placeholder="Enter your email">
    <small class="py-1 text-red-700">@error('email') {{$message}} @enderror</small>
    <input type="password" name="password"  class="my-1  border-teal-600 rounded-md" type="text" placeholder="Enter your password">
    <small class="py-1 text-red-700">@error('password') {{$message}} @enderror</small>
    <input type="password" name="password_confirmation"  class="my-1  border-teal-600 rounded-md" type="text" placeholder="Repeat Password">
    <small class="py-1 text-red-700">@error('password_confirmation') {{$message}} @enderror</small>
    <small class="py-2 text-gray-500">By clicking register you agree to our terms and condition.</small>

    <button class="p-1 rounded-md bg-teal-700 hover:bg-teal-500 text-white">Register</button>
      <a class="text-gray-500 pt-2" href="{{url('login')}}">Already have an account? <u class="text-teal-600">Login</u></a>

    </form>

@endsection
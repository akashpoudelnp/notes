@extends('auth.master')
@section('title', 'LOGIn')
@section('content')
    <form action="{{ route('login') }}" method="post" style="border-top-width: 26px;"
        class="border-1 flex flex-col rounded-md border-teal-600 bg-white p-12 shadow-md">
        <span class="mx-auto text-2xl text-gray-800"> {{ __('login.title') }}</span>
        <h4 class="text-md my-4 text-center text-gray-700">{{ __('login.sub_title') }}</h4>

        @csrf
        <input type="email" class="my-1 rounded-md border-teal-600 form-input" name="email" type="text"
            placeholder="Enter your email">
        <small class="py-1 text-red-700">
            @error('email')
                {{ $message }}
            @enderror
        </small>
        <input type="password" class="my-1 form-input rounded-md border-teal-600" name="password" type="text"
            placeholder="Enter your password">
        <small class="py-1 text-red-700">
            @error('password')
                {{ $message }}
            @enderror
        </small>

        <button class="rounded-md bg-teal-700 p-1 text-white hover:bg-teal-500">{{ __('login.sub_title') }}</button>
        <a class="pt-2 text-gray-500" href="{{ url('register') }}">{{ __('login.no_account') }} <u
                class="text-teal-600">{{ __('login.register') }}</u></a>
    </form>
@endsection

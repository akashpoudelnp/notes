<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="flex flex-col bg-gray-100">
    <div id="dropDownTop" style="top: 6%; left:92%; display:none;"
        class="absolute flex h-28 w-28 flex-col rounded-md bg-white p-2 text-teal-800 shadow-md backdrop-blur-2xl">
        <b>User name</b>
        <hr>
        <a class="py-2" href="">Profile</a>
        <hr>
        <button class="py-2">Logout</button>
    </div>

    <div class="flex h-10 w-full flex-row justify-between bg-teal-600 p-2 text-white" id="navBar">
        <b class="px-5">{{ config('adminpanel.title') }}</b>
        <button id="topDropBtn" onclick="showTopDown()" style="border-radius: 100%"
            class="bg-white px-1 text-teal-600 hover:text-teal-400">AP</button>

    </div>

    <div class="flex h-screen flex-row" id="bottomSection">
        <div id="sideBar" class="flex w-40 flex-col bg-gray-50 py-2 px-1">
            @php
                $urls = config('adminpanel.urls');
            @endphp
            @for ($i = 0; $i < count($urls); $i++)
                <div class="@if (url()->current() == url($urls[$i]['url'])) text-cyan-800 @endif my-2 px-2 hover:text-gray-600"> <a
                        href="{{ url($urls[$i]['url']) }}"><i class="{{ $urls[$i]['icon'] }}"
                            aria-hidden="true"></i>
                        {{ $urls[$i]['name'] }}</a></div>
            @endfor



        </div>
        <div class="flex w-full flex-col bg-white p-5">
            <div class="my-2 text-2xl font-normal text-teal-500">
                @yield('header')
                <hr>
            </div>
            <div>
                @include('components.alert')
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        function showTopDown() {

            var dropDownTop = document.getElementById('dropDownTop');
            dropDownTop.style = "top: 6%; left:92%;";
            document.getElementById('topDropBtn').setAttribute('onclick', 'hideTopDown()');

        }

        function hideTopDown() {

            var dropDownTop = document.getElementById('dropDownTop');
            dropDownTop.style = "display:none;";
            document.getElementById('topDropBtn').setAttribute('onclick', 'showTopDown()');

        }
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100 flex flex-col">
    <div id="dropDownTop" style="top: 6%; left:92%; display:none;" class="absolute backdrop-blur-2xl  bg-white text-teal-800 p-2 flex flex-col w-28 h-28 rounded-md shadow-md">
        <b >User name</b>
        <hr>
        <a class="py-2" href="">Profile</a>
        <hr>
        <button class="py-2">Logout</button>
        </div>

    <div class=" w-full h-10 p-2 bg-teal-600 text-white flex flex-row justify-between" id="navBar">
       <b class="px-5">{{config('adminpanel.title')}}</b>
       <button id="topDropBtn" onclick="showTopDown()" style="border-radius: 100%" class=" px-1 text-teal-600 bg-white  hover:text-teal-400">AP</button>

    </div>

    <div class="flex flex-row h-screen" id="bottomSection">
        <div id="sideBar" class="bg-gray-50 py-2 px-1 w-40 flex flex-col">
            @php
            $urls =       config('adminpanel.urls');
            @endphp
           @for($i=0; $i<count($urls);$i++)
                   <div class="hover:text-gray-600 my-2 px-2 @if(url()->current() == url($urls[$i]['url']))  text-cyan-800  @endif  "> <a href="{{url($urls[$i]['url'])}}"><i class="{{$urls[$i]['icon']}}" aria-hidden="true"></i> {{$urls[$i]['name']}}</a></div>
           @endfor



        </div>
        <div class="bg-white w-full p-5 flex flex-col">
            <div class="text-teal-500 font-normal text-2xl my-2">
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

            var dropDownTop= document.getElementById('dropDownTop');
            dropDownTop.style="top: 6%; left:92%;";
            document.getElementById('topDropBtn').setAttribute('onclick','hideTopDown()');

        }
        function hideTopDown() {

        var dropDownTop= document.getElementById('dropDownTop');
        dropDownTop.style="display:none;";
        document.getElementById('topDropBtn').setAttribute('onclick','showTopDown()');

        }
    </script>

</body>
</html>
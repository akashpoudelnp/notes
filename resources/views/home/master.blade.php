<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dummy Blogs</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-gray-50">
    <div id="topBar" class="flex h-auto w-full justify-center bg-teal-600 p-2 align-middle text-white">
        <h1 class="text-2xl">{{ __('home.title') }}</h1>
        <div class="pl-3 text-xs" id="lang">
            <ul id="lang_menu">
                <li class="language{{ App::isLocale('np') ? ' bg-yellow-500' : '' }}"><a href="/locale/np">Nepali</a>
                </li>
                <li class="language{{ App::isLocale('en') ? ' bg-yellow-500' : '' }}"><a href="/locale/en">English</a>
                </li>
            </ul>
        </div>
    </div>

    @include('components.alert')
    <div class="my-4 p-2">
        @yield('content')
    </div>
    <div class="my-2 text-center text-gray-500">
        <i id="quote" class="text-xs italic">💫</i>
    </div>
    @auth
        <div class="mx-auto text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="rounded-full bg-teal-600 p-2 text-white hover:bg-teal-700">🔑</button>
            </form>
        </div>
    @endauth
    @guest
        <div class="mx-auto text-center">

            <a href="{{ route('login') }}" class="rounded-full bg-teal-600 p-2 text-white hover:bg-teal-700"> <i
                    class="fa fa-sign-in" aria-hidden="true"></i></a>

        </div>
    @endguest

    <script>
        var request = new XMLHttpRequest()

        request.open('GET', 'https://api.quotable.io/random?tags=technology,famous-quotes', true)
        request.onload = function() {
            // Begin accessing JSON data here
            var data = JSON.parse(this.response)

            if (request.status >= 200 && request.status < 400) {
                document.getElementById('quote').innerHTML = '"' + data.content + " , " + data.author + '"';
            }

        }
        request.send()
    </script>

</body>

</html>

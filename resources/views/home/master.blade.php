<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARA</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-gray-50">
    <div id="topBar" class="flex justify-center align-middle w-full  h-auto bg-teal-600 text-white p-2">
        <h1 class="text-2xl">📝</h1>
    </div>
    @include('components.alert')
    <div class="p-2  my-4">
              @yield('content')
    </div>
    <div class="my-2 text-center text-gray-500">
        <i id="quote" class="text-xs italic">💫</i>
    </div>
    <div class="mx-auto text-center">
     <form method="POST" action="{{route('logout')}}">
         @csrf

        <button class=" bg-teal-600 text-white p-2 rounded-full hover:bg-teal-700 ">🔑</button>
     </form>
    </div>

<script>
var request = new XMLHttpRequest()

request.open('GET', 'https://api.quotable.io/random?tags=technology,famous-quotes', true)
request.onload = function() {
  // Begin accessing JSON data here
  var data = JSON.parse(this.response)

  if (request.status >= 200 && request.status < 400) {
      document.getElementById('quote').innerHTML= '"'+data.content +" , "+ data.author+ '"';
  }

}
request.send()
</script>

</body>
</html>
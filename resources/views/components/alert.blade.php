<div>

@if ($errors->any())
<div class="p-2 flex justify-start bg-yellow-600 text-white shadow-md rounded-lg w-2/3  h-auto mx-auto my-4">
    <span class="pl-2 pr-2">
       <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
    </span>
    <p class="pl-2">{{ $errors->first() }}</p>
</div>
@endif
@if(session('error'))
<div class="p-2 flex justify-start bg-red-600 text-white shadow-md rounded-lg w-2/3  h-auto mx-auto my-4">
    <span class="pl-2 pr-2">
      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
    </span>
    <p class="pl-2"> {{ session('error') }}</p>
</div>
@endif
@if(session('success'))
<div class="p-2 flex justify-start bg-green-600 text-white shadow-md rounded-lg w-2/3  h-auto mx-auto my-4">
    <span class="pl-2 pr-2">
   <i class="fa fa-check-circle" aria-hidden="true"></i>
    </span>
    <p class="pl-2"> {{ session('success') }}</p>
</div>
@endif
@if(session('deleted'))
<div class="p-2 flex justify-start bg-red-600 text-white shadow-md rounded-lg w-2/3  h-auto mx-auto my-4">
    <span class="pl-2 pr-2">
   <i class="fa fa-check-circle" aria-hidden="true"></i>
    </span>
    <p class="pl-2"> {{ session('deleted') }}</p>
</div>
@endif
</div>
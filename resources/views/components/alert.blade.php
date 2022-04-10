<div>

    @if ($errors->any())
        <div class="mx-auto my-4 flex h-auto w-2/3 justify-start rounded-lg bg-yellow-600 p-2 text-white shadow-md">
            <span class="pl-2 pr-2">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            </span>
            <p class="pl-2">{{ $errors->first() }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="mx-auto my-4 flex h-auto w-2/3 justify-start rounded-lg bg-red-600 p-2 text-white shadow-md">
            <span class="pl-2 pr-2">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            </span>
            <p class="pl-2"> {{ session('error') }}</p>
        </div>
    @endif
    @if (session('success'))
        <div class="mx-auto my-4 flex h-auto w-2/3 justify-start rounded-lg bg-green-600 p-2 text-white shadow-md">
            <span class="pl-2 pr-2">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
            </span>
            <p class="pl-2"> {{ session('success') }}</p>
        </div>
    @endif
    @if (session('deleted'))
        <div class="mx-auto my-4 flex h-auto w-2/3 justify-start rounded-lg bg-red-600 p-2 text-white shadow-md">
            <span class="pl-2 pr-2">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
            </span>
            <p class="pl-2"> {{ session('deleted') }}</p>
        </div>
    @endif
</div>

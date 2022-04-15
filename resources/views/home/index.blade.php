@extends('home.master')
@section('content')
    <div class="flex justify-center">
        <h3 class="text-3xl text-teal-600">{{ __('home.sub_title') }}</h3>

        <a class="ml-1 rounded-full p-1" href="{{ route('blogs.create') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd" />
            </svg>
        </a>

    </div>

    <hr>
    <div class="mx-4 flex flex-col p-2">
        @forelse ($blogs as $blog)
            <div class="my-2 flex w-auto flex-col rounded-md bg-white p-2 shadow-sm">
                <b class="">{{ $blog->name }}</b>
                <p class="p-1">{{ $blog->description }}</p>
                <span class="flex flex-row text-xs text-gray-600">{{ $blog->created_at->diffForHumans() }}
                    <small class="px-1 font-bold">By {{ $blog->user->name }}</small>
                    @auth
                        @if (auth()->user()->id == $blog->user->id)
                            <a href='{{ url("blogs/$blog->id/edit") }}'>✏️ </a>
                            <form method="POST" action="{{ route('blogs.destroy', $blog) }}">
                                @csrf
                                @method('DELETE')
                                <button>🗑️</button>
                        @endif
                    @endauth
                    </form>
                </span>
            </div>
        @empty
            <div class="flex flex-col rounded-md bg-white p-2 shadow-sm">
                <h2>Empty Canvas</h2>
            </div>
        @endforelse


    </div>
@endsection

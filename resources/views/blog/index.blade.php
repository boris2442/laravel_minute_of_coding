@extends('base')
@section('title', 'blog')
@section('content')

<div class="p-4">
    <ul class="flex flex-wrap gap-3 items-center">
        @foreach ($articles as $article)
        <li class='border border-gray-300 p-2 my-2 max-w-[400px]'>
            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                class=' object-cover h-[300px] mb-4 max-h-[200px] w-[300px] hover:scale-105' />
            <h2 class='text-lg font-bold'>{{ $article->title }}</h2>
            <a href="{{ route('article.show', $article->id) }}" class="text-white bg-blue-800 px-4 py-1 rounded-md">Voir
                plus...</a>
            {{-- <p class='text-gray-600'>{{ $article->description }}</p>
            <p class='text-gray-500'>Category: {{ $article->category->name }}</p> --}}


        </li>
        @endforeach
    </ul>
</div>


@endsection()
@extends('base')
@section('title', 'dashboard')
@section('content')
    <div class="py-6">
        <h1 class='text-2xl font-blod text-uppercase'>Page dashboard</h1>
        <div class="flex items-center justify-between my-4">
            <a class="py-2 px-4 bg-green-600 hover:bg-green-700 text-white rounded" href={{ route('blog.create') }}>create un
                article</a>
            <form method="POST" action="{{ route('logout') }} ">
                @csrf
                <button class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded" type='submit'>Deconnexion</button>
            </form>
        </div>
        <ul class="flex flex-wrap gap-3 items-center">
            @foreach ($articles as $article)
                <li class='border border-gray-300 p-2 my-2 max-w-[400px]'>
                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                        class=' object-cover h-auto mb-4 max-h-[200px] w-full hover:scale-105' />
                    <h2 class='text-lg font-bold'>{{ $article->title }}</h2>
                    <p class='text-gray-600'>{{ $article->description }}</p>
                    <p class='text-gray-500'>Category: {{ $article->category->name }}</p>
                    <div class='flex justify-between mt-4'>
                        <a {{-- href="{{ route('blog.show', $article->id) }}" --}} class='text-blue-500 hover:underline'>Voir</a>
                        <a {{-- href="{{ route('blog.edit', $article->id) }}" --}} class='text-yellow-500 hover:underline'>Modifier</a>
                        <form method="POST" action="{{ route('article.delete', $article->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class='text-red-500 hover:underline'
                                onClick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                        </form>
                    </div>

                </li>
            @endforeach
        </ul>
    </div>
@endsection

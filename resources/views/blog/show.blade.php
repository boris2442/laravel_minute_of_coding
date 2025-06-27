@extends('base')
@section('title', 'single')
@section('content')

<div class="p-4">
    <h1 class="text-center mt-6 font-bold uppercase mb-6">{{$article->title}}</h1>
    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
        class=' object-cover h-full mb-4 max-h-[200px] w-[300px] hover:scale-105' />
        <p class="">{{$article->description}}</p>
        <p class="italic">Ecrit pae {{$article->author->name}}</p>
</div>


@endsection()
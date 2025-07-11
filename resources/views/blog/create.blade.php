@extends('base')
@section('title', 'create_blog')
@section('content')

    <div class="max-w-lg mx-auto mt-10">
        @if (session()->has('success'))
            <div class='bg-green-100 text-green-500 border-green-500 px-4 py-3 rounded relative'>
                <p class='font-bold'>Success</p>
                <span class='text-sm sm:inline'>{{ session('success') }}</span>
            </div>
        @endif
        @if (session()->has('error'))
            <div class='bg-red-100 text-red-500 border-red-500 px-4 py-3 rounded relative'>
                <p class='font-bold'>Error</p>
                <span class='text-sm sm:inline'>{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-500 p-3 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method='POST' class="p-8" action="{{ route('article.store') }}" enctype="multipart/form-data">

            @csrf
            <div class='mb-6'>
                <label for='title' class="text-gray-700 block text-sm font-medium mb-2">Titre de l'article</label>
                <input name='title' id="title" class='w-full px-3 py-2 border-rounded border-gray-300 shadow-md'
                    value="{{ old('title') }}" />
                @error('title')
                    <p class='bg-red-100 text-red-500 p-3 font-bold'>{{ $message }}</p>
                @enderror
            </div>
            <div class='mb-6'>
                <label for='description' class="text-gray-700 block text-sm font-medium mb-2">description de
                    l'article</label>
                <textarea name='description' id="description" class='w-full px-3 py-2 border-rounded border-gray-300 shadow-md'>{{ old('description') }} </textarea>
                @error('description')
                    <p class='bg-red-100 text-red-500 p-3 font-bold'>{{ $message }}</p>
                @enderror

            </div>
            <div class='mb-6'>
                <label for='category' class="text-gray-700 block text-sm font-medium mb-2">category</label>
                <input type='text' name='category' id="category"
                    class='w-full px-3 py-2 border-rounded border-gray-300 shadow-md' value="{{ old('category') }}" />
                @error('category')
                    <p class='bg-red-100 text-red-500 p-3 font-bold'>{{ $message }}</p>
                @enderror
            </div>
            <div class='mb-6'>
                <label for='image' class="text-gray-700 block text-sm font-medium mb-2">image</label>
                <input type='file' name='image' id="image"
                    class='w-full px-3 py-2 border-rounded border-gray-300 shadow-md' value="{{ old('image') }}" />
                @error('image')
                    <p class='bg-red-100 text-red-500 p-3 font-bold'>{{ $message }}</p>
                @enderror
            </div>
            <div class='mb-6'>

                <button type='submit'
                    class='w-full px-3 py-2 border-runded border-gray-300 shadow-md bg-gradient-to-b '>creer un
                    article</button>

            </div>


        </form>



    </div>

@endsection

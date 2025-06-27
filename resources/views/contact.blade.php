@extends('base')
@section('title', 'contact')
@section('content')
<div class="max-w-lg mx-auto p-4">
    @if(session('success'))
    <div class="bg-green100 text-green-500 p-3">
        <p>Message envoye</p>
        <p>{{session('success')}}</p>
    </div>
    @endif
    <form method="post" class="mt-4" action="{{ route('contact.send') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class='text-medium text-gray-700'> name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class='block mt-1 py-4 rounded shadow-md w-full'>
            @error('name')
            <p class="bg-red-100 text-red-500 p-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class='text-medium text-gray-700'> email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class='block mt-1 py-4 rounded shadow-md w-full'>
            @error('email')
            <p class="bg-red-100 text-red-500 p-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="message" class='text-medium text-gray-700'> message</label>
            <textarea name="message" id="message"
                class='block mt-1 py-4 rounded shadow-md w-full'>{{ old('message') }}</textarea>
            @error('message')
            <p class="bg-red-100 text-red-500 p-2">{{$message}}</p>
            @enderror
        </div>
        <button type='submit' class='w-full px-3 py-2 border-runded border-gray-300 shadow-md bg-gradient-to-b '>Envoyer
           </button>
    </form>
</div>
@endsection()
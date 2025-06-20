@extends('base')
@section('title', 'Se connecter')
@section('content')

    <div class='max-w-lg mx-auto p-6 bg-white rounded-md shadow-md '>
        @if (session()->has('success'))
            <div class='bg-green-100 text-green-500 border-green-500 px-4 py-3 rounded relative'>
                <p class='font-bold'>Success</p>
                <span class='text-sm sm:inline'>{{ session('success') }}</span>
            </div>
        @endif
        @if(session()->has('error'))
            <div class='bg-red-100 text-red-500 border-red-500 px-4 py-3 rounded relative'>
                <p class='font-bold'>Error</p>
                <span class='text-sm sm:inline'>{{ session('error') }}</span>
            </div>
         @endif
        <form action="{{ route('login.submit') }}" class="mt-4" method='POST'>
            @csrf
            
            <div class="mb-4">
                <label for='email' class='block text-sm text-gray-700 font-sm'>email:</label>
                <input type="email" id="email" class=" mt-1 p-3 block w-full border-gray-300 shadow-md "
                    name='email'>
                @error('email')
                    <p class='bg-red-100 text-red-500 p-3 font-bold'>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for='password' class='block text-sm text-gray-700 font-sm'>password:</label>
                <input type="password" id="password" class=" mt-1 p-3 block w-full border-gray-300 shadow-md "
                    name='password'>
                @error('password')
                    <p class='bg-red-100 text-red-500 p-3 font-bold'>{{ $message }}</p>
                @enderror
            </div>
           
            <button type='submit'
                class='text-white rounded-md w-full py-2 px-4 bg-gray-800 hover:bg-gray-900'>Se connecter</button>
            <p -500class='my-2 text-sm'> Pas de compte ? <a href='{{ route('register') }}' class='text-red-400'>S'inscrire</a></p>

        </form>
    </div>

@endsection()

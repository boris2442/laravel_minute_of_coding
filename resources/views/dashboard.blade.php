@extends('base')
@section('title', 'dashboard')
@section('content')
    <div class="py-6">
        <h1>Page dashboard</h1>
        <form method="POST" action="{{ route('logout') }} ">
        @csrf
        <button class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded" type='submit' >Deconnexion</button>
            </form>
        </div>
@endsection

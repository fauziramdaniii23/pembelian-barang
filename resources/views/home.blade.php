@extends('component.main')
@section('main')

    @auth
    <h1 class="text-slate-900 font-semibold text-2xl">Selamat datang {{ auth()->user()->name }}</h1>
        
    @endauth
    <h1>Hello World</h1>
@endsection
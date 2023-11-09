@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')
@include('layouts.partials.navbar')

<h1>Home</h1>

@auth
    <p>Bienvenido {{auth()->user()->name}}, estas autenticado</p>
@endauth

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <input type="submit" value="CERRAR">
</form>
@endsection

@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')
<h1>Home</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <input type="submit" value="CERRAR">
</form>
@endsection

@extends('layouts.plantilla')

@section('title', 'Registro')

@section('content')
    <h1>Pagina de Registro</h1>
    <form action="{{route('user.register')}}" method="POST">
        @csrf
        <input type ="name"          name ="name">
        <input type ="email"         name ="email">
        <input type ="password"      name ="password">
        <input type ="password"      name ="password_confirmation">

        <input type="submit" value="Registrarse">
    </form>
@endsection

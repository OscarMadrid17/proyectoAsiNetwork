@extends('layouts.auth_layout')

@section('title', 'Login')

@section('content')

<form   action="{{route('user.login')}}" method="POST">
    @csrf
    <div class="image-container">
        <img src="{{asset('/logo/asi.png')}}" alt="AsiLogo">
    </div>
    <div class="form-group">
        Soy Cliente
        <input type="checkbox" name="is_customer">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo Electrónico | Código  de Cliente </label>
        <input type="text"     name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name')}}">
        <div id="emailHelp" class="form-text">Si es cliente, marque la casilla e ingrese su código de cliente, si es empleado no marque la casilla e ingrese su correo electrónico.</div>

        @error('name')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror

    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{old('password')}}">

        @error('password')
        <br>
            <span>*{{ $message }}</span>
        <br>
        @enderror
    </div>
    <button type="submit"  value="Login" class="btn btn-primary">Ingresar</button>
  </form>


@endsection

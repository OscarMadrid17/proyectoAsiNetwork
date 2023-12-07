@extends('layouts.auth')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container-fluid" style="background-color:#212529;">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-4 col-sm-10">
                <form action="{{route('admin.login')}}" method="POST" class="card card-body shadow">
                    @csrf
                    <img src="{{asset('/img/asi.png')}}" class="img-fluid w-50 m-auto" alt="AsiLogo">

                    @error('login_error')
                        <div class="alert alert-danger my-3" role="alert">
                            <i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}
                        </div>
                    @endif

                    <div class="my-4">
                        <label class="form-label">
                            <span>
                                <i class="fa-solid fa-user"></i>
                            </span>
                            Email
                        </label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Ingrese su Correo Electronico">
                        @error('email')
                            <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            <span>
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            Clave
                        </label>
                        <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="**********">
                        @error('password')
                            <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                        @enderror
                    </div>

                    <a class="d-block text-center" href="{{ route('customers.view.login') }}">Login Clientes ASI</a>

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary" type="submit">INGRESAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

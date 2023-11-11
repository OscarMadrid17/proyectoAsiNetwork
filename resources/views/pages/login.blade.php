@extends('layouts.auth')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-4 col-sm-10">
            <form action="{{route('api.login')}}" method="POST" class="card card-body shadow">
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
                        Email | Código de Cliente
                    </label>
                    <input type="text" name="email_or_customer_code" class="form-control" value="{{old('email_or_customer_code')}}" placeholder="Ingrese su Codigo o Correo Electronico">
                    @error('email_or_customer_code')
                        <span class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</span>
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
                        <span class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-primary" type="submit">INGRESAR</button>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection

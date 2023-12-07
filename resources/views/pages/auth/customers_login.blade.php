@extends('layouts.auth')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-4 col-sm-10">
            <form action="{{route('customers.login')}}" method="POST" class="card card-body shadow">
                @csrf
                <img src="{{asset('/img/asi.png')}}" class="img-fluid w-50 m-auto" alt="AsiLogo">

                @error('login_error')
                    <div class="alert alert-warning my-3" role="alert">
                        <i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}
                    </div>
                @endif

                <div class="my-4">
                    <label class="form-label">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                        Código de Cliente
                    </label>
                    <input type="text" name="customer_code" class="form-control" value="{{old('customer_code')}}" placeholder="Ingrese su Codigo de cliente">
                    @error('customer_code')
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

                <a class="d-block text-center" href="{{ route('admin.view.login') }}">Login Admin</a>

                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-primary" type="submit">INGRESAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

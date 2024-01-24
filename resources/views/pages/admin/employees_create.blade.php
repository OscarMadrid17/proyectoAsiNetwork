@extends('layouts.admin')

@section('title', 'Creación de Credenciales ASI')

@section('content')
<div class="container py-5">
    <div class="col-md-6 mx-auto">
        <form action="{{ route('admin.employees.store') }}" method="post" class="card card-body shadow">
            @csrf
            <h1 class="text-center">Crear credenciales de empleado</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre y Apellido</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_superadmin" class="form-label">Super Admin</label>

                <div class="d-block">
                    <label class="form-check-label mx-3">
                        <input type="radio" name="is_superadmin" id="is_superadmin" value="yes" class="form-check-input">
                        Si
                    </label>

                    <label class="form-check-label mx-3">
                        <input type="radio" name="is_superadmin" id="is_superadmin" value="no" class="form-check-input">
                        No
                    </label>
                </div>

                @error('is_superadmin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="submit" value="Crear Usuario" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection


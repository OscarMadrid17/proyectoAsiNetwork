@extends('layouts.admin')

@section('title', 'Creación de Credenciales ASI')

@section('content')
<div class="container py-5">
    <h1 class="text-center">Crear credenciales de empleado</h1>

    <form action="{{ route('admin.employees.store') }}" method="post" class="col-md-6 mx-auto">
        @csrf
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
            <label class="form-check-label">
                <input type="radio" name="rol" id="is_superadmin" value="is_superadmin" class="form-check-input">
                Administrador
            </label>
        </div>

        <div class="mb-3">
            <label class="form-check-label">
                <input type="radio" name="rol" id="is_support" value="is_support" class="form-check-input">
                Soporte
            </label>
            @error('rol')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="submit" value="Crear Usuario" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection


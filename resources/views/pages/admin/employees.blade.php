@extends('layouts.admin')

@section('title', 'Soporte ASI')

@section('content')
<div class="container mt-3 bg-light py-3 rounded-3">

    <div class="row">
        <div class="col-md-12 my-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 text-dark fw-bold">
                    Empleados ASI
                </h1>
                @if(Auth()->user()->is_superadmin)
                <a href="{{ route('admin.employees.create') }}" class="btn btn-sm btn-dark">
                    <i class="fa-solid fa-plus"></i>&nbsp;Registrar
                </a>
                @endif
            </div>
        </div>

        @if (!empty($employees) && count($employees) > 0)
            <div class="col-md-12">
                <div class="table-responsive table-theme">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <small>Nombre</small>
                                </th>
                                <th class="text-center">
                                    <small>Correo Electronico</small>
                                </th>
                                <th class="text-center">
                                    <small>Super Admin</small>
                                </th>
                                <th class="text-center">
                                    <small>Soporte/Ingenieria</small>
                                </th>
                                <th class="text-center">
                                    <small>Opciones</small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="text-center">
                                        {{ $employee->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $employee->email }}
                                    </td>
                                    <td class="text-center">
                                        @if ($employee->is_superadmin == 1)
                                            <span class="badge bg-success">SI</span>
                                        @else
                                            <span class="badge bg-dark">NO</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($employee->is_support == 1)
                                            <span class="badge bg-dark">SOPORTE</span>
                                        @endif

                                        @if ($employee->status == 0)
                                            <span class="badge bg-primary">INGENIERIA</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-gears"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                {{-- LINK A EDITAR Y CREAR USUARIOS --}}
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">
                                    <small>Nombre</small>
                                </th>
                                <th class="text-center">
                                    <small>Correo Electronico</small>
                                </th>
                                <th class="text-center">
                                    <small>Super Admin</small>
                                </th>
                                <th class="text-center">
                                    <small>Soporte/Ingenieria</small>
                                </th>
                                <th class="text-center">
                                    <small>Opciones</small>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @else
            <p class="text-center fw-lighter text-muted">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <br>
                No se encontraron registros.
            </p>
        @endif
    </div>
</div>

@if(Session::has('message'))
<div class="container text-center py-3">
    <div class="alert alert-danger" role="alert">
        {{ Session::get('message') }}
    </div>
</div>
@endif

@endsection

@extends('layouts.customers')

@section('title', 'Mis Tickets ASI')

@section('content')
<div class="container mt-5 bg-light py-3 rounded-3 shadow">
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 text-primary fw-bold">
                    Mis Tickets
                </h1>
                <a href="{{ route('customers.tickets.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-plus"></i>&nbsp;Nuevo Ticket
                </a>
            </div>
        </div>

        <div class="col-md-12">
            <div class="table-responsive table-theme">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <small>Id</small>
                            </th>

                            <th class="text-center">
                                <small>Servicios Afectados</small>
                            </th>

                            <th class="text-center">
                                <small>Tipo de Reporte</small>
                            </th>

                            <th class="text-center">
                                <small>Fecha de la detección</small>
                            </th>

                            <th class="text-center">
                                <small>Estado</small>
                            </th>

                            <th class="text-center">
                                <small>Fecha de Creación</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td class="text-center">
                                {{ $ticket->id }}
                            </td>
                            <td class="text-center">
                                {{ $ticket->affected_services }}
                            </td>
                            <td class="text-center">
                                {{ $ticket->report_type }}
                            </td>
                            <td class="text-center">
                                {{ $ticket->detection_datetime }}
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">ESTADO</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">{{ $ticket->created_at }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">
                                <small>Id</small>
                            </th>

                            <th class="text-center">
                                <small>Servicios Afectados</small>
                            </th>

                            <th class="text-center">
                                <small>Tipo de Reporte</small>
                            </th>

                            <th class="text-center">
                                <small>Fecha de la detección</small>
                            </th>

                            <th class="text-center">
                                <small>Estado</small>
                            </th>

                            <th class="text-center">
                                <small>Fecha de Creación</small>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

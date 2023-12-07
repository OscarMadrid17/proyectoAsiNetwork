@extends('layouts.customers')

@section('title', 'Mis Tickets ASI')

@section('content')
<div class="container mt-4 bg-light py-3 rounded-3 shadow">
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

        @if(session('ticket_stored'))
        <div class="col-md-12">
            <div class="alert alert-success my-3" role="alert">
                <i class="fa-solid fa-check-double"></i>&nbsp;Ticket enviado exitosamente!
            </div>
        </div>
        @endif

        <div class="col-md-12">
            @if(!empty($tickets) && count($tickets) > 0)
                <div class="table-responsive table-theme">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <small>Service ID</small>
                                </th>

                                <th class="text-center">
                                    <small>Servicio Afectado</small>
                                </th>

                                <th class="text-center">
                                    <small>Tipo de Reporte</small>
                                </th>

                                <th class="text-center">
                                    <small>Estado</small>
                                </th>

                                <th class="text-center">
                                    <small>Fecha de Incidente</small>
                                </th>

                                <th class="text-center">
                                    <small>Hora de Incidente</small>
                                </th>

                                <th class="text-center">
                                    <small>Fecha de Creación</small>
                                </th>
                                <th class="text-center">
                                    <small>Opciones</small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td class="text-center">
                                    {{ $ticket->affected_service_id }}
                                </td>
                                <td class="text-center">
                                    {{ $ticket->affected_service_name }}
                                </td>
                                <td class="text-center">
                                    {{ $ticket->reportTypeText }}
                                </td>
                                <td class="text-center">
                                    @if ($ticket->status == 0)
                                        <span class="badge bg-success">ABIERTO</span>
                                    @endif

                                    @if ($ticket->status == 1)
                                        <span class="badge bg-warning">EN PROCESO</span>
                                    @endif

                                    @if ($ticket->status == 2)
                                        <span class="badge bg-danger">CERRADO</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        {{ $ticket->detection_date }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        {{ $ticket->detection_time }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        {{ $ticket->created_at }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-gears"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('customers.tickets.preview', [ 'id' => $ticket->id ]) }}">Ver Detalles</a></li>
                                            @if ($ticket->file != '')
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('customers.tickets.file.preview', [ 'id' => $ticket->id ]) }}" target="_blank">Ver Adjunto</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">
                                    <small>Service ID</small>
                                </th>

                                <th class="text-center">
                                    <small>Servicio Afectado</small>
                                </th>

                                <th class="text-center">
                                    <small>Tipo de Reporte</small>
                                </th>

                                <th class="text-center">
                                    <small>Estado</small>
                                </th>

                                <th class="text-center">
                                    <small>Fecha de Incidente</small>
                                </th>

                                <th class="text-center">
                                    <small>Hora de Incidente</small>
                                </th>

                                <th class="text-center">
                                    <small>Fecha de Creación</small>
                                </th>

                                <th class="text-center">
                                    <small>Opciones</small>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
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
</div>

@endsection

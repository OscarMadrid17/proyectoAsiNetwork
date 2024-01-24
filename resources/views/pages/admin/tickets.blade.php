@extends('layouts.admin')

@section('title', 'Admin Tickets - ASI')

@section('content')
<div class="container mt-4 bg-light py-3 rounded-3 shadow">
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 text-dark fw-bold">
                    Admin Tickets
                </h1>
            </div>
        </div>

        <div class="col-md-12">
            @if(!empty($tickets) && count($tickets) > 0)
                <div class="table-responsive table-theme">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <small>N. Cliente</small>
                                </th>

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
                                    {{ $ticket->customer->customer_code }}
                                </td>

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
                                        {{ Carbon\Carbon::parse($ticket->detection_date)->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        {{ Carbon\Carbon::parse($ticket->detection_time)->format('H:i') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        {{ Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y H:i') }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-gears"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('admin.tickets.preview', [ 'id' => $ticket->id ]) }}">Ver Detalles</a></li>

                                            @if ($ticket->status != 0 )
                                                <li><a class="dropdown-item" href="#" onclick="document.getElementById('{{ 'update_ticket_to_open_form_' . $ticket->id }}').submit();">Cambiar Estado a ABIERTO</a></li>
                                                <form method="POST" action="{{ route('admin.tickets.status') }}" id="{{ 'update_ticket_to_open_form_' . $ticket->id }}">
                                                    @csrf
                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                    <input type="hidden" name="new_status" value="0">
                                                </form>
                                            @endif

                                            @if ($ticket->status != 1 )
                                                <li><a class="dropdown-item" href="#" onclick="document.getElementById('{{ 'update_ticket_to_in_progress_form_' . $ticket->id }}').submit();">Cambiar Estado a EN PROCESO</a></li>
                                                <form method="POST" action="{{ route('admin.tickets.status') }}" id="{{ 'update_ticket_to_in_progress_form_' . $ticket->id }}">
                                                    @csrf
                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                    <input type="hidden" name="new_status" value="1">
                                                </form>
                                            @endif

                                            @if ($ticket->status != 2 )
                                                <li><a class="dropdown-item" href="#" onclick="document.getElementById('{{ 'update_ticket_to_closed_form_' . $ticket->id }}').submit();">Cambiar Estado a CERRADO</a></li>
                                                <form method="POST" action="{{ route('admin.tickets.status') }}" id="{{ 'update_ticket_to_closed_form_' . $ticket->id }}">
                                                    @csrf
                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                    <input type="hidden" name="new_status" value="2">
                                                </form>
                                            @endif

                                            @if ($ticket->file != '')
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('admin.tickets.file.preview', [ 'id' => $ticket->id ]) }}" target="_blank">
                                                        Ver Adjunto
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    {{-- <a href="#">
                                        <i class="fa-solid fa-comment"></i>
                                    </a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">
                                    <small>N. Cliente</small>
                                </th>

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

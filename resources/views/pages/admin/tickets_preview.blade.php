@extends('layouts.admin')

@section('title', 'Gestionar Ticket')

@section('content')
<div class="container mt-4 bg-light py-1 mb-5 rounded-3 shadow">
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 text-dark fw-bold">
                    <i class="fa-solid fa-ticket"></i>&nbsp;Resumen de Ticket
                </h1>
                <a href="{{ route('customers.tickets') }}" class="btn btn-sm btn-outline-dark">
                    <i class="fa-solid fa-chevron-left"></i>&nbsp;Regresar
                </a>
            </div>

            <hr class="bg-light">
        </div>
    </div>

    <div>
        @csrf

        <div class="row py-1 px-4">
            @if ($ticket->internal_customer_ticket)
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <p class="d-block fw-bold text-muted ml-0 mb-4">
                            N. de ticket Interno: <span class="fw-lighter">{{ $ticket->internal_customer_ticket }}</span>

                            <small class="d-block fw-lighter">
                                Fecha: {{ $ticket->detection_date }} - {{ $ticket->detection_time }}
                                <br>
                                Visita: {{ $ticket->visit_schedule_datetime ?? 'Fecha sin asignar.' }}
                            </small>
                        </p>
                    </div>
                </div>
            @endif

            <div class="col-md-4">
                <h6 class="d-block fw-bold text-muted ml-0 mb-2">
                    Datos del Cliente
                </h6>

                <p class="form-label text-muted">
                    {{ $ticket->name }}
                    <br>
                    <small>
                        {{ $ticket->email }} - {{ $ticket->phone_number }}
                    </small>
                </p>
            </div>

            <div class="col-md-4">
                <h6 class="d-block fw-bold text-muted ml-0 mb-2">
                    Datos de Contacto
                </h6>

                <p class="form-label text-muted">
                    {{ $ticket->contact_name ?? 'No se agrego nombre de contacto' }}
                    <br>
                    <small>
                        {{ $ticket->first_contact_email ?? 'No 1er Email' }} - {{ $ticket->second_contact_email ?? 'No 2do Email' }}
                    </small>
                </p>
            </div>

            <div class="col-md-4">
                <h6 class="d-block fw-bold text-muted ml-0 mb-2">
                    Detalles del Incidente
                </h6>

                <p class="form-label text-muted">
                    Service ID: {{ $ticket->affected_service_id }}
                    <br>
                    Servicio Afectado: {{ $ticket->affected_service_name }}
                    <br>
                    @if ($ticket->file != '')
                        <a href="{{ route('customers.tickets.file.preview', [ 'id' => $ticket->id ]) }}">
                            Ver Adjunto
                        </a>
                    @endif
                </p>
            </div>
        </div>

        <div class="row py-1 px-4">
            <div class="col-md-12">
                <h6 class="d-block fw-bold text-muted ml-0 mb-2">
                    Descripcion:
                </h6>
                <p class="form-label text-muted">
                    {{ $ticket->description ?? 'No se agregaron detalles en la descripcion.' }}
                </p>
                <br>
                <h6 class="d-block fw-bold text-muted ml-0 mb-2">
                    Requerimientos de visita:
                </h6>
                <p class="form-label text-muted">
                    {{ $ticket->visit_requirement ?? 'No se agregaron detalles en los requerimientos de visita.' }}
                </p>

            </div>
        </div>

        <hr class="bg-light">
    </div>
</div>

<div class="container mt-2 bg-light py-1 mb-3 rounded-3 shadow">
    <div class="row">
        <div class="col-md-12 p-3">
            <div class="card-body">
                <form action="{{ route('admin.tickets.comment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ request()->route()->parameters['id'] }}">

                    <div class="mb-3">
                        <textarea class="form-control" name="content" rows="4" placeholder="Agregar comentario"></textarea>

                        @error('content')
                            <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-dark">Agregar Comentario</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="container bg-light p-3 mb-5 rounded-3 shadow">
    <div class="row">
        <div class="col-md-12 p-1">
            <ul class="list-group mt-2">
                @if (!empty($ticket->comments) && count($ticket->comments))
                    @foreach ($ticket->comments as $comment)

                        @if ($comment->user_id == auth()->user()->id)
                            <div class="rounded my-1 px-4 py-2 border" style="background: #eef1f6;">
                                <p class="text-muted">
                                    {{ $comment->content }}
                                </p>

                                <small class="d-block text-muted" style="font-size: 12px;">
                                    {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                </small>

                                <div class="d-flex justify-content-between align-items-center" style="font-size: 12px;">
                                    <strong class="d-block text-muted">
                                        {{ $comment->user->name }}
                                    </strong>
                                    <span class="d-block text-muted">
                                        {{ $comment->user->is_superadmin ? 'Depto. Ingenieria' : 'Soporte Tecnico' }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="rounded my-1 px-4 py-2 border" style="background: #eeedf2;">
                                <p class="text-muted text-end">
                                    {{ $comment->content }}
                                </p>

                                <small class="d-block text-muted text-end" style="font-size: 12px;">
                                    {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                </small>

                                @if ($comment->user != null)
                                    <div class="d-flex justify-content-between align-items-center" style="font-size: 12px;">
                                        <strong class="d-block text-muted">
                                            {{ $comment->user->name }}
                                        </strong>
                                        <span class="d-block text-muted">
                                            {{ $comment->user->is_superadmin ? 'Depto. Ingenieria' : 'Soporte Tecnico' }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @else
                    <p class="text-center fw-bold text-muted">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <br>
                        No hay comentarios aún.
                    </p>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection

@extends('layouts.customers')

@section('title', 'Mis Tickets ASI')

@section('content')
<div class="container mt-4 bg-light py-1 mb-5 rounded-3 shadow">
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 text-primary fw-bold">
                    <i class="fa-solid fa-ticket"></i>&nbsp;Resumen de Ticket
                </h1>
                <a href="{{ route('customers.tickets') }}" class="btn btn-sm btn-outline-dark">
                    <i class="fa-solid fa-chevron-left"></i>&nbsp;Regresar
                </a>
            </div>

            <hr class="bg-light">
        </div>
    </div>

    <form action="{{route('customers.tickets.store')}}" method="POST" enctype="multipart/form-data">
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
    </form>
</div>

<div class="container mt-2 bg-light py-1 mb-3 rounded-3 shadow">
    <div class="row">
        <div class="col-md-12 p-3">
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" id="commentBody" name="body" rows="2" placeholder="Agregar comentario" required></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary">Agregar Comentario</button>
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
                @forelse (optional($ticket->comments)->reverse() ?? [] as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at }}
                        <p>{{ $comment->body }}</p>
                    </li>
                @empty
                    <p class="text-center fw-bold text-muted">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <br>
                        No hay comentarios aún.</p>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection

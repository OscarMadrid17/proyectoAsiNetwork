@extends('layouts.customers')

@section('title', 'Mis Tickets ASI')

@section('content')
<div class="container mt-4 bg-light py-3 mb-5 rounded-3 shadow">
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 text-primary fw-bold">
                    <i class="fa-solid fa-ticket"></i>&nbsp;Nuevo Ticket
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

        <div class="row py-3 px-4">
            <div class="col-md-12">
                <small class="d-block fw-bold text-muted mb-2">
                    Datos del Cliente
                </small>
            </div>

            <div class="col-md-4">
                <label for="name" class="form-label text-muted"><i class="fa-solid fa-user"></i>&nbsp;Nombre</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="{{ $customer_details ? $customer_details['name'] : ''  }}" placeholder="Ejm: Oscar Madrid">
                @error('name')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="email" class="form-label text-muted">
                    <i class="fa-solid fa-envelope"></i>&nbsp;Correo
                    Electronico
                </label>
                <input type="text" class="form-control" name="email" id="email"
                    value="{{ $customer_details ? $customer_details['email'] : '' }}"
                    placeholder="Ejm: oscar@asinetwork.com">
                @error('email')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="phone_number" class="form-label text-muted"><i
                        class="fa-solid fa-phone"></i>&nbsp;Teléfono</label>
                <input type="tel" class="form-control" name="phone_number" id="phone_number"
                    value="{{ $customer_details ? $customer_details['number'] : ''  }}" name="phone_number"
                    placeholder="Ejm: 97412830">
                @error('phone_number')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>
        </div>

        <hr class="bg-light">

        <div class="row py-3 px-4">
            <div class="col-md-12">
                <small class="d-block fw-bold text-muted mb-2">
                    Informacion de Contacto
                </small>
            </div>

            <div class="col-md-4">
                <label for="contact_name" class="form-label text-muted"><i
                        class="fa-solid fa-user"></i>&nbsp;Nombre</label>
                <input type="text" class="form-control" name="contact_name" id="contact_name"
                    placeholder="Ejm: Oscar Madrid">
                @error('contact_name')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="first_contact_email" class="form-label text-muted"><i
                        class="fa-solid fa-envelope"></i>&nbsp;E-mail 1 para recibir notificaciones</label>
                <input type="text" class="form-control" name="first_contact_email" id="first_contact_email"
                    placeholder="Escribe tu email">
                @error('first_contact_email')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="second_contact_email" class="form-label text-muted"><i
                        class="fa-solid fa-envelope"></i>&nbsp;E-mail 2 para recibir notificaciones</label>
                <input type="text" class="form-control" name="second_contact_email" id="second_contact_email"
                    placeholder="Escribe tu email">
                @error('second_contact_email')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>
        </div>

        <hr class="bg-light">

        <div class="row py-3 px-4">
            <div class="col-md-12">
                <small class="d-block fw-bold text-muted mb-2">
                    Informacion del Incidente
                </small>
            </div>

            <div class="col-md-4">
                <label class="form-label text-muted" for="report_type"><i class="fa-solid fa-filter"></i>&nbsp;Tipo de reporte</label>
                <select class="form-select mb-3" name="report_type" id="report_type">
                    @if(!empty($report_types))
                        @for ($i = 0; $i < count($report_types); $i++)
                            <option value="{{ $i }}">{{ $report_types[$i] }}</option>
                        @endfor
                    @endif
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label text-muted" for="internal_customer_ticket">
                    <i class="fa-solid fa-fingerprint"></i>&nbsp;Número de ticket Interno del cliente
                </label>
                <input type="text" class="form-control" name="internal_customer_ticket" id="internal_customer_ticket"
                    placeholder="Ejm: ASI-N-Ticket">
                @error('internal_customer_ticket')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label text-muted" for="detection_date">
                                <i class="fa-solid fa-calendar"></i>&nbsp;Fecha
                            </label>

                            <div class="input-group date datepicker">
                                <input type="text" class="form-control" name="detection_date" id="detection_date"
                                    placeholder="dd/mm/yyyy">

                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                            <small class="text-muted fw-lighter d-block">
                                **Registre el dia en que ocurrio el incidente.
                            </small>

                            @error('detection_date')
                                <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label text-muted" for="detection_time">
                                <i class="fa-solid fa-clock"></i>&nbsp;Hora
                            </label>
                            <input class="form-control" type="time" id="detection_time" name="detection_time">
                            <small class="text-muted fw-lighter d-block">
                                **Registre la hroa en que ocurrio el incidente.
                            </small>

                            @error('detection_time')
                                <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label text-muted" for="visit_schedule_datetime">
                                <i class="fa-solid fa-clock"></i>&nbsp;Fecha de visita
                            </label>

                            <div class="input-group date datepicker">
                                <input type="text" class="form-control" name="visit_schedule_datetime" id="visit_schedule_datetime"
                                    placeholder="dd/mm/yyyy">

                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                            <small class="text-muted fw-lighter d-block">
                                **Registre el dia en que desee tener la visita tecnica.
                            </small>

                            @error('visit_schedule_datetime')
                                <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="bg-light">

        <div class="row py-3 px-4">
            <div class="col-md-12">
                <small class="d-block fw-bold text-muted mb-2">
                    Servicios Afectados
                    <small class="text-muted fw-lighter d-block">
                        **Click para seleccionar los servicios
                    </small>
                </small>
            </div>

            <div class="row">
                @if(!empty($customer_services))
                    @foreach ($customer_services as $service)
                        <div class="col-md-4 form-check">
                            <input class="form-check-input" type="radio" name="affected_service" value="{{ $service['service_id'] . '||' . $service['name'] }}" id="flexCheckIndeterminate">

                            <label class="form-check-label" for="flexCheckIndeterminate">
                                <p class="text-muted">
                                    {{ $service['name'] }}
                                    <small class="d-block">
                                        Service ID: {{ $service['service_id'] }}
                                    </small>
                                </p>
                            </label>
                        </div>
                    @endforeach
                @endif

                @error('affected_service')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>
        </div>

        <hr class="bg-light">

        <div class="row py-3 px-4">
            <div class="col-md-12">
                <small class="d-block fw-bold text-muted mb-2">
                    Informacion Adicional
                    <small class="text-muted fw-lighter d-block">
                        **Agrega toda la informacion que consideres importante
                    </small>
                </small>
            </div>

            <div class="col-12">
                <label class="form-label text-muted" for="description"><i class="fa-solid fa-align-center"></i>&nbsp;Descripción:</label>
                <textarea id="description" class="form-control" name="description" placeholder="Describa el paso a paso del inconveniente"></textarea>

                @error('description')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 mt-4">
                <label class="form-label text-muted" for="visit_requirement">
                    <i class="fa-solid fa-align-center"></i>&nbsp;Requerimientos para visita
                </label>
                <textarea id="visit_requirement" class="form-control" name="visit_requirement" placeholder="Definir requerimientos para visita"></textarea>

                @error('visit_requirement')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 mt-4">
                <label class="form-label text-muted" for="image">
                    <i class="fa-regular fa-file-image"></i>&nbsp;Adjuntar un archivo
                </label>
                <input accept=".jpg,.png" type="file" name="file" class="form-control" id="file">

                @error('file')
                    <small class="text-danger fw-light"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row py-3 px-4">
            <div class="d-flex justify-content-end align-items-end">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-rocket"></i>&nbsp;Enviar Incidente</button>
            </div>
        </div>
    </form>
</div>

<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        startDate: '-0d'
    });
</script>
@endsection

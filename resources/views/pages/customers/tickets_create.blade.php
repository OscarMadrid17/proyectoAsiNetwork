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
                <a href="{{ route('customers.tickets') }}" class="btn btn-sm btn-outline-dark">
                    <i class="fa-solid fa-chevron-left"></i>&nbsp;Regresar
                </a>
            </div>

            <hr class="bg-light">
        </div>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row py-3 px-4">
            <div class="col-md-12">
                <small class="d-block fw-bold text-muted mb-2">
                    Datos del Cliente
                </small>
            </div>

            <div class="col-md-4">
                <label for="name" class="form-label text-muted"><i class="fa-solid fa-user"></i>&nbsp;Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $customer_details ? $customer_details['name'] : ''  }}" placeholder="Ejm: Oscar Madrid">
            </div>

            <div class="col-md-4">
                <label for="email" class="form-label text-muted"><i class="fa-solid fa-envelope"></i>&nbsp;Correo Electronico</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $customer_details ? $customer_details['email'] : ''  }}" placeholder="Ejm: oscar@asinetwork.com">
            </div>

            <div class="col-md-4">
                <label for="phone_number" class="form-label text-muted"><i class="fa-solid fa-phone"></i>&nbsp;Teléfono</label>
                <input type="tel" class="form-control" id="phone_number" value="{{ $customer_details ? $customer_details['number'] : ''  }}" name="phone_number" placeholder="Ejm: 97412830">
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
                <label for="contact_name" class="form-label text-muted"><i class="fa-solid fa-user"></i>&nbsp;Nombre</label>
                <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Ejm: Oscar Madrid">
            </div>

            <div class="col-md-4">
                <label for="first_contact_email" class="form-label text-muted"><i class="fa-solid fa-envelope"></i>&nbsp;E-mail 1 para recibir notificaciones</label>
                <input type="email" class="form-control" name="first_contact_email" id="first_contact_email" placeholder="Escribe tu email">
            </div>

            <div class="col-md-4">
                <label for="second_contact_email" class="form-label text-muted"><i class="fa-solid fa-envelope"></i>&nbsp;E-mail 2 para recibir notificaciones</label>
                <input type="email" class="form-control" name="second_contact_email" id="second_contact_email" placeholder="Escribe tu email">
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
                <label class="form-label text-muted" for="report_type">Tipo de reporte</label>
                <select class="form-select mb-3" name="report_type" id="report_type">
                    <option value="">Seleccione un tipo de reporte</option>

                    @if(!empty($report_types))
                        @for ($i = 0; $i < count($report_types); $i++)
                            <option value="{{ $i }}">{{ $report_types[$i] }}</option>
                        @endfor
                    @endif
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label text-muted" for="internal_customer_ticket">Número de ticket Interno del cliente</label>
                <input type="email" class="form-control" name="internal_customer_ticket" id="internal_customer_ticket" placeholder="Ejm: ASI-N-Ticket">
            </div>

            <div class="col-md-12 mt-4">
                <div class="col-md-12">
                    <small class="d-block fw-bold text-muted mb-2">
                        Servicios Afectados
                        <small class="text-muted fw-lighter d-block">
                            Click para seleccionar los servicios
                        </small>
                    </small>
                </div>

                <div class="row">
                    @if(!empty($customer_services))
                        @foreach  ($customer_services as $service)
                            <div class="col-md-4 form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $service['service_id'] }}" id="flexCheckIndeterminate">

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
                </div>

            </div>
        </div>

        {{-- <section class="container">
            <h3 class="pt-4 pb-2">Fecha y Hora de la detección </h3>
            <div class="row form-group">
                <label for="date" class="col-sm-1 col-form-label">Fecha</label>
                <div class="col-sm-4">
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" name="dateDetection" id="dateDetection" placeholder="dd/mm/yyyy">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <div>
            <label for="reportTime">Hora:</label>
            <input type="time" id="reportTime" name="reportTime" >
        </div>

        <h3 class="pt-4 pb-2">En caso de ser necesaria una visita, por favor indique:</h3> --}}


        {{-- <section class="container">
            <div class="row form-group">
                <label for="scheduleVisit" class="col-sm-1 col-form-label">Horario para realizar la visita</label>
                <div class="col-sm-4">
                    <div class="input-group date" id="datepickerScheduleVisit">
                        <input type="text" class="form-control" name="scheduleVisit" id="scheduleVisit"
                            placeholder="dd/mm/yyyy">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </section> --}}


        {{-- <div class="col-12">
            <label for="description">Descripción:</label>
            <br>
            <textarea id="description" name="description"></textarea>
        </div>

        <div class="col-12">
            <label for="visitRequirement">Requerimientos para visita</label>
            <br>
            <textarea id="visitRequirement" name="visitRequirement"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Adjuntar un archivo</label>
            <br>
            <input type="file" name="image" id="image">
        </div> --}}

        <div class="d-flex justify-content-end align-items-end">
            <button type="submit" class="btn btn-primary">Enviar Incidente</button>
        </div>
    </form>
</div>

@endsection

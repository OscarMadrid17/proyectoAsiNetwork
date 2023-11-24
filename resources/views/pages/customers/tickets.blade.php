@extends('layouts.customers')

@section('title', 'Tickets Clients')

@section('content')

<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('/assets/css/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-datepicker.css')}}">
@vite(['resources/css/app.css'])


<script src="{{ asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="https://kit.fontawesome.com/f7053d7bda.js" crossorigin="anonymous"></script>
<script src="{{ asset('/assets/js/datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>



@vite(['resources/js/app.js'])

<div class="container">
    <form action="{{route('ticket.store')}}" class="row g-3" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
            <label for="name" class="form-label">Nombre de quien reporta incidencia</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Escribe tu nombre">
        </div>

        <div class="col-6">
            <label for="email" class="form-label">E-mail de quien reporta</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Escribe tu email">
        </div>

        <div class="col-6">
            <label for="phoneNumber" class="form-laber">Número de Teléfono de quien reporta:</label>
            <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" name="phoneNumber" placeholder="Numero de telefono">
        </div>

        <div class="col-6">
            <label for="emailNotifications" class="form-label">E-mail 1 para recibir notificaciones</label>
            <input type="email" class="form-control" name="emailNotifications" id="emailNotifications" placeholder="Escribe tu email">
        </div>

        <div class="col-6">
            <label for="emailNotifications2" class="form-label">E-mail 2 para recibir notificaciones</label>
            <input type="email" class="form-control" name="emailNotifications2" id="emailNotifications2" placeholder="Escribe tu email">
        </div>

        <div>
            <label for="reportType">Tipo de reporte</label>
            <select class="form-select form-select-lg mb-3" name="reportType" id="reportType">
                <option value="">Seleccione un tipo de reporte</option>
                <option value="1">Caída total</option>
                <option value="2">Degradación</option>
                <option value="3">Sin servicio Afectado</option>
                <option value="4">Consulta Administrativa</option>
            </select>
        </div>

        <section class="container">
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

        <h3 class="pt-4 pb-2">En caso de ser necesaria una visita, por favor indique:</h3>


        <section class="container">
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
        </section>

        <div class="col-6">
            <label for="nameContact" class="form-label">Nombre de contacto para visita</label>
            <input type="text" class="form-control" name="contactName" id="contactName"
                placeholder="Nombre de contacto">
        </div>

        <div>
            <label for="internalCustomerTicket">Número de ticket Interno del cliente</label>
            <br>
            <input type="text" name="internalCustomerTicket" id="internalCustomerTicket">
        </div>

        <div class="col-12">
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
        </div>

        <button type="submit">Crear</button>
    </form>

    <script>
        $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
            startDate: '-0d'
        });

    </script>

    <script>
        $('#datepickerScheduleVisit').datepicker({
            format: "dd/mm/yyyy",
            startDate: '-0d'
        });

    </script>

</div>
@endsection

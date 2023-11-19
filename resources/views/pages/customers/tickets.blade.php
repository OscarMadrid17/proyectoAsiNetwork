@extends('layouts.customers')

@section('title', 'Tickets Clients')

@section('content')


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Plugin datepicker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<div class="container">
        <form action="" class="row g-3">
            @csrf
            <div class="col-6">
                <label for="name"  class="form-label">Nombre</label>
                <input type="text" class="form-control"    id="name"  placeholder="Escribe tu nombre">
            </div>

            <div class="col-6">
                <label for="email"  class="form-label">E-mail</label>
                <input type="email" class="form-control"    id="email"  placeholder="Escribe tu email">
            </div>

            <div class="col-6">
                <label for="phoneNumber" class="form-laber">Número de Teléfono:</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" pattern="^\d{4}-\d{4}$" placeholder="Numero de telefono">
            </div>

            <div class="col-6">
                <label for="emailNotifications"  class="form-label">E-mail para recibir notificaciones</label>
                <input type="email" class="form-control"    id="emailNotifications"  placeholder="Escribe tu email">
            </div>

            <div>
                <label for="affectedService">Servicio Afectado</label>
                <select class="form-select form-select-lg mb-3" name="affectedService" id="affectedService">
                    <option value="1">Uno</option>
                    <option value="2">Dos</option>
                    <option value="3">Tres</option>
                    <option value="4">Cuatro</option>
                    <option value="5">Cinco</option>
                </select>
            </div>

            <div>
                <label for="reportType">Tipo de reporte</label>
                <select class="form-select form-select-lg mb-3" name="reportType" id="reportType">
                    <option value="1">Uno</option>
                    <option value="2">Dos</option>
                    <option value="3">Tres</option>
                    <option value="4">Cuatro</option>
                    <option value="5">Cinco</option>
                </select>
            </div>

            <section class="container">
                <h3 class="pt-4 pb-2">Fecha y Hora de la deteccion</h3>
                <form>
                    <div class="row form-group">
                        <label for="date" class="col-sm-1 col-form-label">Fecha</label>
                        <div class="col-sm-4">
                            <div class="input-group date" id="datepicker" >
                                <input type="text" class="form-control" placeholder="dd/mm/yyyy">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </section>

            <div>
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" step="300">
            </div>
            <div class="col-12">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <input type="file" name="" id="">
            </div>

            <button type="submit"   class="btn btn-primary">Crear Ticket</button>
    </form>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
</div>
@endsection




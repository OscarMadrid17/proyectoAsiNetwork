@extends('layouts.customers')

@section('title', 'Mis Tickets ASI')

@section('content')
<div class="container mt-3 bg-light py-3 rounded-3">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive table-theme">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <small>Id</small>
                            </th>
                            <th class="text-center">
                                <small>Name</small>
                            </th>
                            <th class="text-center">
                                <small>Email</small>
                            </th>
                            <th class="text-center">
                                <small>numero de Telefono</small>
                            </th>
                            <th class="text-center">
                                <small>Tipo de Reporte</small>
                            </th>
                            <th class="text-center">
                                <small>Fecha de la detección</small>
                            </th>
                            <th class="text-center">
                                <small>Hora de la detección</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ticketData as $ticket)
                        <tr>
                            <td class="text-center">
                                {{$ticket->id}}
                            </td>
                            <td class="text-center">
                                {{$ticket->name}}
                            </td>
                            <td class="text-center">
                                {{$ticket->email}}
                            </td>
                            <td class="text-center">
                                {{$ticket->phoneNumber}}
                            </td>
                            <td class="text-center">
                                {{$ticket->reportType}}
                            </td>
                            <td class="text-center">
                                {{$ticket->dateDetection}}
                            </td>
                            <td class="text-center">
                                {{$ticket->reportTime}}
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">Status</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">
                                <small>Name</small>
                            </th>
                            <th class="text-center">
                                <small>Email</small>
                            </th>
                            <th class="text-center">
                                <small>XD</small>
                            </th>
                            <th class="text-center">
                                <small>XD</small>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.employees')

@section('title', 'Soporte ASI')

@section('content')
<div class="container mt-3 bg-light py-3 rounded-3">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive table-theme">
                <table id="example" class="table table-hover">
                    <thead>
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
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                EJEMPLO
                            </td>
                            <td class="text-center">
                                EJEMPLO
                            </td>
                            <td class="text-center">
                                EJEMPLO
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">YES</span>
                            </td>
                        </tr>
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

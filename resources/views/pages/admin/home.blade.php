@extends('layouts.admin')

@section('title', 'Soporte ASI')

@section('content')
<main>
    <div class="container py-4">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-3">
                <h3 class="fw-bold">Gestionar Tickets</h3>
                <p class="col-md-8 fs-5">
                    Aquí puedes gestionar y llevar el seguimiento de los casos de los clientes corporativos de ASI
                </p>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-body-secondary border-top">
            &copy; ASI NETWORK 2024
        </footer>
    </div>

    @if(Session::has('message'))
        <div class="container text-center py-3">
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif
</main>

@endsection

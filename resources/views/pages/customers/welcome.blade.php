@extends('layouts.customers')

@section('title', 'Soporte ASI')

@section('content')
<main>
    <div class="container py-4 mt-5">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3 shadow">
            <div class="container-fluid py-3">
                <h3 class="fw-bold">Bienvenido a ASI Network</h3>
                <p class="col-md-8 fs-5">
                   Es un gusto tenerte por aqui, si crees que tienes irregularidades con alguno de tus servicios puedes reportarlo aqui
                </p>
                <a href="{{ route('customers.tickets.create') }}" class="btn btn-primary btn-sm" type="button"><i class="fa-solid fa-file-export"></i>&nbsp;Nuevo Ticket</a>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-body-secondary border-top">
            &copy; ASI NETWORK 2024
        </footer>
    </div>
</main>

@endsection

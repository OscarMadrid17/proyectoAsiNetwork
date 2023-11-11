@extends('layouts.customers')

@section('title', 'Soporte ASI')

@section('content')
<main>
    <div class="container py-4">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-3">
                <h3 class="fw-bold">Bienvenido a ASI Network</h3>
                <p class="col-md-8 fs-5">
                    Using a series of utilities, you can create this jumbotron, just like the one
                    in previous versions of Bootstrap.
                </p>
                <button class="btn btn-primary btn-sm" type="button"><i class="fa-solid fa-file-export"></i>&nbsp;Nuevo Ticket</button>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-body-secondary border-top">
            &copy; ASI NETWORK 2023
        </footer>
    </div>
</main>

@endsection

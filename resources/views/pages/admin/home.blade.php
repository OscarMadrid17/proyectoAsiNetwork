@extends('layouts.admin')

@section('title', 'Soporte ASI')

@section('content')
<main>
    <div class="container py-4">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-fluid py-3">
                <h3 class="fw-bold">Gestionar Tickets</h3>
                <p class="col-md-8 fs-5">
                    Using a series of utilities, you can create this jumbotron, just like the one
                    in previous versions of Bootstrap.
                </p>
                <button class="btn btn-primary btn-sm" type="button"><i class="fa-solid fa-file-export"></i>&nbsp;Nuevo Ticket</button>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 px-5 py-3 text-bg-dark rounded-3">
                    <h4>Change the background</h4>
                    <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look.
                        Then, mix and match with additional component themes and more.</p>
                    <button class="btn btn-outline-light" type="button">Example button</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 px-5 py-3 bg-body-tertiary border rounded-3">
                    <h4>Add borders</h4>
                    <p>Or, keep it light and add a border for some added definition to the boundaries of your content.
                        Be sure to look under the hood at the source HTML here as we've adjusted the alignment and
                        sizing of both column's content for equal-height.</p>
                    <button class="btn btn-outline-secondary" type="button">Example button</button>
                </div>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-body-secondary border-top">
            &copy; ASI NETWORK 2023
        </footer>
    </div>
</main>

@endsection

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('customers.welcome') }}">
            <img src="{{ asset('/img/asi_no_slogan.png') }}" class="img-fluid" style="max-height: 30px;" alt="ASI LOGO">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('customers.tickets') }}"><i class="fa-solid fa-ticket"></i>&nbsp;Mis Tickets</a>
                </li>

                <li class="nav-item">
                    <button class="nav-link" onclick="document.getElementById('form-logout').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Cerrar Sesion
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form id="form-logout" method="POST" action="{{ route('customers.logout') }}">
    @csrf
</form>

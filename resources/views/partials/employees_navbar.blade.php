<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('/img/asi_no_slogan.png') }}" class="img-fluid" style="max-height: 30px;" alt="ASI LOGO">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.tickets') }}">Tickets</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.employees') }}">Empleados</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="document.getElementById('form-logout').submit()">
                        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Cerrar Sesion
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<form id="form-logout" method="POST" action="{{ route('admin.logout') }}">
    @csrf
</form>

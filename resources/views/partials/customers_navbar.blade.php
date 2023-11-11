<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{ asset('/img/asi_no_slogan.png') }}" class="img-fluid" style="max-height: 30px;" alt="ASI LOGO">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <button class="nav-link" onclick="logout()">
                        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Cerrar Sesion
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>


<form id="form-logout" method="POST" action="{{ route('logout') }}">
    @csrf

    {{-- <input type="hidden" name="access_token" value="{{  }}"> --}}
</form>


<script>
    function logout() {
        // Append access token from localStorage to form-logout
        const el = document.createElement("input");
        el.name = "access_token";
        el.type = 'hidden';
        el.value = localStorage.getItem('access_token');

        const form = document.getElementById("form-logout");
        form.appendChild(el);
        localStorage.removeItem('access_token')
        form.submit();
    }
</script>

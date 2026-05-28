<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Barberia Miguel & Daniel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
</head>
<body>

@auth
    <!-- Navbar para usuarios autenticados -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="mb-0 text-primary text-uppercase"><i class="fa fa-cut me-3"></i>Barberia</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                <a href="{{ route('home') }}" class="nav-item nav-link active">Inicio</a>

                <a href="{{ route('reserves.index') }}" class="nav-item nav-link">Reservas</a>
                <a href="{{ route('reviews.index') }}" class="nav-item nav-link">Reseñas</a>
            
                @if(Auth::user()->role_id == 31)
                    {{-- Admin ve todo --}}
                    <a href="{{ route('users.index') }}" class="nav-item nav-link">Usuarios</a>
                    <a href="{{ route('advertisements.index') }}" class="nav-item nav-link">Avisos</a>
                    <a href="{{ route('payments.index') }}" class="nav-item nav-link">Pagos</a>
                @elseif(Auth::user()->role_id == 32)
                    {{-- Barbero --}}
                    <a href="{{ route('advertisements.index') }}" class="nav-item nav-link">Avisos</a>
                @elseif(Auth::user()->role_id == 33)
                    {{-- Cliente --}}
                    <a href="{{ route('advertisements.index') }}" class="nav-item nav-link">Avisos</a>
                    <a href="{{ route('payments.index') }}" class="nav-item nav-link">Pagos</a>
                    <a href="{{ route('reserve_services.index') }}" class="nav-item nav-link">Reserva-Servicio</a>
                @endif

            </div>

            <!-- Logout -->
            <div class="d-flex align-items-center p-4 p-lg-0">
                <span class="text-white me-3">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary rounded-0 py-2 px-lg-4">
                        Salir <i class="fa fa-sign-out-alt ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
@endauth

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
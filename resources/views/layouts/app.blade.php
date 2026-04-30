<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Barberia Miguel & Daniel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('principal') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="mb-0 text-primary text-uppercase"><i class="fa fa-cut me-3"></i>Barberia</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <a href="https://docs.google.com/document/d/1GbfQN6i8CG9w01huqyaFOi97-eRAFQxM/edit?usp=sharing&ouid=113016344267457325102&rtpof=true&sd=true">Sobre Nosotros</a>
            <a href="{{ route('advertisements.index') }}" class="nav-item nav-link">Avisos</a>
            <a href="{{ route('users.index') }}" class="nav-item nav-link">Usuario</a>
        </div>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('principal') }}" class="nav-item nav-link active">Inicio</a>
                <a href="{{ route('reserves.index') }}" class="nav-item nav-link">Reserva</a>
                <a href="{{ route('reserve_services.index') }}" class="nav-item nav-link">Enlazar Servicio a Reserva</a>
                <a href="{{ route('reviews.index') }}" class="nav-item nav-link">Reseña</a>
            </div>
            <a href="{{ route('payments.index') }}" class="btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-block">Pagar Reserva<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->



<!-- CONTENIDO -->
@yield('content')

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- JS LIBRERÍAS -->
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- JS PRINCIPAL -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
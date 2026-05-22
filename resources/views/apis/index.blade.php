<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas con Plotly</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plotly -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body onload="consumir_api()">

    <div class="container mt-5">

        <h2 class="mb-4">Análisis de Posts</h2>

        <!-- Gráfica 1 -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Longitud de títulos por post</h5>
                <div id="grafica1"></div>
            </div>
        </div>

        <!-- Gráfica 2 -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Posts por usuario</h5>
                <div id="grafica2"></div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/api.js') }}"></script>

</body>
</html>
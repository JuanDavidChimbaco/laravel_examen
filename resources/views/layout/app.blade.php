<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <title>Mi Aplicación</title>
</head>
<body>
    <header>
        <!-- Aquí puedes agregar la navegación, encabezado, etc. -->
    </header>

    <main>
        @yield('content') <!-- Aquí se incluirá el contenido específico de cada vista -->
    </main>

    <footer>
        <!-- Aquí puedes agregar el pie de página, información de contacto, etc. -->
    </footer>
</body>
</html>

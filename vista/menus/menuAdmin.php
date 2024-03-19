<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['doc'])) {
    $doc = $_SESSION['doc'];
    $nombres = $_SESSION['nombres'];
    $apellidos = $_SESSION['apellidos'];
} else {
    // El usuario no ha iniciado sesión, redirige o realiza alguna acción
    header('Location: pagina_error.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bienvenido</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f8ff; /* Color de fondo azul claro */
        }

        .navbar {
            background-color: #007bff; /* Color de fondo azul principal para la barra de navegación */
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #ffffff; /* Color del ícono del botón de navegación */
        }

        .container {
            margin-top: 50px;
        }

        .jumbotron {
            background-color: #ffffff; /* Color de fondo blanco para el área principal */
            border: 1px solid #007bff; /* Borde azul alrededor del área principal */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px;
        }

        .servicios-citas {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Centro Odontológico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Citas</a>
                </li>
                <!-- Agrega más enlaces según tus necesidades -->
                <li class="nav-item">
                    <a class="nav-link" href="../paciente/login.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">¡Bienvenido, <?php echo $nombres . ' ' . $apellidos; ?>!</h1>
            <p class="lead">Documento: <?php echo $doc; ?></p>
            <hr class="my-4">
            <!-- Puedes agregar más contenido o características aquí -->
            <div class="row servicios-citas">
                <div class="col-md-6">
                    <h2>Servicios</h2>
                    <p>Descubre nuestros servicios odontológicos.</p>
                    <!-- Puedes agregar más información o enlaces aquí -->
                    <a href="#" class="btn btn-primary">Ver Servicios</a>
                </div>
                <div class="col-md-6">
                    <h2>Citas</h2>
                    <p>Agenda tu cita con nosotros.</p>
                    <!-- Puedes agregar más información o enlaces aquí -->
                    <a href="#" class="btn btn-primary">Agendar Cita</a>
                </div>
            </div>
            <img src="imagen_representativa.jpg" alt="Imagen Representativa" class="img-fluid mt-4" />
        </div>
    </div>

    <!-- Agrega el enlace al archivo JavaScript de Bootstrap y al archivo jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

 <style>
        body {
       background: url('../..//assets/imagenes/backGroundLogin.jpg') no-repeat center center fixed;
            background-size: cover;
       
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
<?php
session_start();

// Comprobar si hay una sesión activa
if (isset($_SESSION['DOCUMENTO'])) {
    // Resto del código para usuarios autenticados
    $documento = $_SESSION['DOCUMENTO'];
    $nombre = $_SESSION['NOMBRE'];
    $apellido = $_SESSION['APELLIDO'];
} else {
    // Si no hay sesión activa, redirigir a la página de inicio de sesión
    header('Location: ../salidas/errorAccesoSinLogin.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styleMenuUsuario.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Centro Odontológico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../usuario/editarDatos.php">Editar Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Citas</a>
                </li>
                <!-- Agrega más enlaces según tus necesidades -->
                <li class="nav-item">
                    <a class="nav-link" href="../salidas/cerraSesion.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

     <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">¡Bienvenido Administrador, <?php echo $nombre . ' ' . $apellido; ?>!</h1>
            <hr class="my-4">
            <div class="row servicios-citas">
                <div class="col-md-6">
                    <h2>Usuario Registrados</h2>
                    <p>Aca podras gestionar a los usuarios registrados.</p>
                    <a href="../administrador/personasRegistradas.php" class="btn btn-primary">Gestionar</a>
                </div>
                <div class="col-md-6">
                    <h2>Control de Existencias</h2>
                    <p>Gestiona el inventario de insumos.</p>
                    <a href="../administrador/controlExistencias.php" class="btn btn-primary">Gestionar Existencias</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

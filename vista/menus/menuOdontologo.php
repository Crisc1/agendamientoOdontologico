<?php
session_start();

// Comprobar si hay una sesión activa
if (isset($_SESSION['DOCUMENTO'])) {
    // Resto del código para usuarios autenticados
    $documento = $_SESSION['DOCUMENTO'];
    $nombre = $_SESSION['NOMBRE'];
    $apellido = $_SESSION['APELLIDO'];
    $idProfesional = $_SESSION['ID_PROFESIONAL'];
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
    <link rel="stylesheet" href="../../assets/css/styleMenu.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Centro Odontológico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../paciente/editarDatos.php">Editar Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../salidas/cerraSesion.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">¡Bienvenido Odontólogo, <?php echo $nombre . ' ' . $apellido; ?>!</h1>
            <hr class="my-4">
            <div class="row servicios-citas">
                <div class="col-md-6">
                    <h2>Agenda Odontológica</h2>
                    <p>Aca podras ver tu agenda de citas.</p>
                    <form action="../../controladores/controlCitas.php" method="post">
                        <input type="hidden" name="idProfesionalAgenda" id="idProfesionalAgenda" value="<?php echo $idProfesional; ?>">
                        <button type="submit" class="btn btn-primary">Consultar Agenda</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2>Historial Odontólogico</h2>
                    <p>Consuta y/o añade novedades al historial de un paciente.</p>
                    <a href="../odontologo/historialMenu.php" class="btn btn-primary">Consultar - Generar</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

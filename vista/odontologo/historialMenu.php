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
    <title>Historial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styleMenu.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Centro Odontológico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        </button>
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Historial Odontológico</h1>
            <hr class="my-4">
            <div class="row servicios-citas">
                <div class="col-md-6">
                    <h2>Generar Odontograma</h2>
                    <p>Aqui podras generar el odontograma del paciente.</p>
                    <a href="../odontologo/citaOdontograma.php" class="btn btn-primary">Generar</a>
                    </form>
                    <br>
                </div>
                <br>
                <div class="col-md-6">
                    <h2>Consulta Odontograma</h2>
                    <p>Aqui podras consultar el odontograma del paciente.</p>
                    <a href="../odontologo/odontogramaAdulto.php" class="btn btn-primary">Consultar</a>

                    <br>
                </div>
                <br>
                <div class="col-md-6">
                    <h2>Agregar Procedimientos</h2>
                    <p>Aqui podras añadir la descripcion de un procedimiento.</p>
                    <a href="../odontologo/historial.php" class="btn btn-primary">Agregar</a>
                </div>
                <div class="col-md-6">
                    <h2>Consultar Procedimientos</h2>
                    <p>Aqui podras añadir la descripcion de un procedimiento.</p>
                    <a href="../odontologo/historial.php" class="btn btn-primary">Consultar</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
session_start();

// Comprobar si hay una sesión activa
if (isset($_SESSION['DOCUMENTO'])) {
    // Resto del código para usuarios autenticados
    $documento = $_SESSION['DOCUMENTO'];
    $nombre = $_SESSION['NOMBRE'];
    $apellido = $_SESSION['APELLIDO'];
    $idProfesional = $_SESSION['ID_PROFESIONAL'];

    // Obtener el documento del paciente desde el query parameter
    $documento_paciente = isset($_GET['documento_paciente']) ? $_GET['documento_paciente'] : '';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/odontologo/styleOdontogramaAdulto.css" />
    <script src="../../assets/js/odontologo/odontogramaAdulto.js"></script>
    <title>Historial Odontológico</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Centro Odontológico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="volver-container">
                        <a class="nav-link volver-link" href="#" onclick="goBack()">Volver</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="titulo">Odontograma</h1>

    <div class="odontograma">
        <!-- Sección 1 -->
        <div class="seccion" id="seccion1"></div>

        <!-- Sección 2 -->
        <div class="seccion" id="seccion2"></div>
    </div>

    <div id="infoSeleccion" class="form-container">
        <form id="comentarioForm">
            <label for="imagenSeleccionada">Imagen Seleccionada:</label>
            <input type="text" id="imagenSeleccionada" readonly>
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" rows="4"></textarea>
            <button type="button" onclick="agregarALista()">Añadir</button>
        </form>
    </div>

    <div id="listaAgregados" class="form-container">
        <h2>Lista de Agregados</h2>
        <ul id="listaAgregadosUl"></ul>
    </div>
    
    <div class="form-container">
        <button id="enviarOdontogramaBtn" onclick="enviarOdontograma()">Enviar Odontograma</button>
    </div>
</body>
</html>

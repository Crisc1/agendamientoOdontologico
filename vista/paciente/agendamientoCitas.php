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
    <link rel="stylesheet" href="../../assets/css/paciente/styleAgendamiento.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js/paciente/agendamiento/Especialidades.js"></script>
    <script src="../../assets/js/paciente/agendamiento/Tratamientos.js"></script>
    <script src="../../assets/js/paciente/agendamiento/Profesional.js"></script>
    <script src="../../assets/js/paciente/agendamiento/HorasDisponibles.js"></script>
    <title>Agendamiento</title>
</head>

<body>
    <h1>AGENDAMIENTO DE CITAS</h1>
    <form action="../../controladores/controlCitas.php" method="post">
        <div id="resultadoConsulta"></div>
        <input type="hidden" name="documento" value="<?php echo $documento; ?>">

        <label for="especialidad">Servicio:</label>
        <select name="especialidad" id="especialidad" required>
            <option value="">Selecciona un servicio</option>
            <!-- Aquí se cargarán dinámicamente las opciones de servicio mediante JavaScript -->
        </select>
        <br><br>

        <label for="tratamiento">Tratamiento:</label>
        <select name="tratamiento" id="tratamiento" required>
            <option value="" selected>Seleccione un tratamiento</option>
            <!-- Las opciones se cargarán dinámicamente mediante JavaScript -->
        </select>
        <br><br>

        <label for="profesional">Odontologo:</label>
        <select name="profesional" id="profesional" required>
            <option value="">Selecciona un odontólogo</option>
            <!-- Aquí se cargarán dinámicamente las opciones de odontólogo mediante JavaScript -->
        </select>
        <br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required>
        <br><br>

        <label for="hora">Hora:</label>
        <select name="hora" id="hora" required>
            <!-- Las opciones se cargarán dinámicamente mediante JavaScript -->
        </select>
        <br><br>
        <script src="../../assets/js/agendamiento/HorasDisponibles.js"></script>
        <input type="hidden" name="consultorio" id="consultorio" value="1">
        <button type="submit">Enviar</button>
    </form>
</body>

</html>

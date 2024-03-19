<?php
session_start();

if (isset($_SESSION['DOCUMENTO'])) {
    $nombre = $_SESSION['NOMBRE'];
    $apellido = $_SESSION['APELLIDO'];
    $idProfesional = $_SESSION['ID_PROFESIONAL'];
    
} else {
    header('Location: ../salidas/errorAccesoSinLogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agenda Odontologica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styleAgenda.css">
    <script src="../assets/js/odontologo/agendaDia.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="../vista/menus/menuOdontologo.php">Centro Odontológico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"></button>
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
    <div class="content-container">
        <h1>Lista de Citas</h1>
        <?php

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar la tabla con los detalles de las citas
            echo "<table>
                    <tr>
                        <th>Paciente</th>
                        <th>Tipo de Cita</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Consultorio</th>
                        <th>Acciones</th>
                    </tr>";

            while ($fila = $result->fetch_object()) {
                echo "<tr>
                        <td>{$fila->NOMBRE_PACIENTE}</td>
                        <td>{$fila->NOMBRE_TRATAMIENTO}</td>
                        <td>{$fila->FECHA}</td>
                        <td>{$fila->HORA}</td>
                        <td>{$fila->NUMERO_CONSULTORIO}</td>
                        <td>
                            <button class='btn editar-btn' onclick='confirmAsistencia({$fila->DOCUMENTO_PACIENTE})'>Asitio</button>
                            <button class='btn eliminar-btn' onclick='inasistencia({$fila->DOCUMENTO_PACIENTE})'>No Asistio</button>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No hay citas disponibles.";
        }
        ?>
    </div>
</body>
</html>

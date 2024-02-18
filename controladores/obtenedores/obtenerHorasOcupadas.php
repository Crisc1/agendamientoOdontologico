<?php
include_once "../ConexionDB.php";

$conexionDB = new ConexionDB();

if ($conexionDB->abrir()) {
    if (isset($_GET['fecha']) && isset($_GET['idProfesional'])) {
        $fecha = $_GET['fecha'];
        $idProfesional = $_GET['idProfesional'];

        // Crear un array para almacenar las horas ocupadas
        $horasOcupadas = array();

        // Obtener las horas ocupadas para la fecha y el profesional
        $consultaHorasOcupadas = "SELECT HORA FROM CITA WHERE FECHA = '$fecha' AND ID_PROFESIONAL = $idProfesional";
        $conexionDB->consultar($consultaHorasOcupadas);

        $resultadoHorasOcupadas = $conexionDB->obtenerResult();

        if ($resultadoHorasOcupadas->num_rows > 0) {
            while ($filaHora = $resultadoHorasOcupadas->fetch_assoc()) {
                $horasOcupadas[] = $filaHora['HORA'];
            }
        }

        // Devolver las horas ocupadas en formato JSON
        echo json_encode($horasOcupadas);
    } else {
        // Los parámetros necesarios no están presentes en la solicitud
        echo json_encode(array('error' => 'Parámetros no proporcionados.'));
    }

    $conexionDB->cerrar();
} else {
    // No se pudo abrir la conexión a la base de datos
    echo json_encode(array('error' => 'No se pudo abrir la conexión a la base de datos.'));
}
?>

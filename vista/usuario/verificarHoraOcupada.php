<?php
include('../../controladores/ConexionDB.php');

function obtenerHorasOcupadas($idProfesional, $fechaSeleccionada) {
    // Crear una instancia de la clase ConexionDB
    $conexionDB = new ConexionDB();

    // Abrir la conexión a la base de datos
    if ($conexionDB->abrir()) {
        // Consultar citas para la fecha y el odontólogo específicos
        $sql = "SELECT HORA FROM CITA WHERE ID_PROFESIONAL = $idProfesional AND FECHA = '$fechaSeleccionada'";
        $conexionDB->consultar($sql);

        // Obtener resultados
        $result = $conexionDB->obtenerResult();

        // Almacenar horas ocupadas en un array
        $horasOcupadas = array();
        while ($row = $result->fetch_assoc()) {
            $horasOcupadas[] = $row['HORA'];
        }

        // Cerrar la conexión a la base de datos
        $conexionDB->cerrar();

        return $horasOcupadas;
    } else {
        // No se pudo abrir la conexión a la base de datos
        return array('error' => 'No se pudo abrir la conexión a la base de datos.');
    }
}

// Ejemplo de uso
$idProfesional = isset($_POST['id_profesional']) ? $_POST['id_profesional'] : null;
$fechaSeleccionada = isset($_POST['fecha_seleccionada']) ? $_POST['fecha_seleccionada'] : null;

if ($idProfesional !== null && $fechaSeleccionada !== null) {
    $horasOcupadas = obtenerHorasOcupadas($idProfesional, $fechaSeleccionada);
    echo json_encode($horasOcupadas);
} else {
    echo json_encode(array('error' => 'Datos incompletos para la verificación de hora ocupada.'));
}
?>

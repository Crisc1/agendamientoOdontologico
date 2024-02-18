<?php
include_once "../ConexionDB.php";

// Crear una instancia de la clase ConexionDB
$conexionDB = new ConexionDB();

// Abrir la conexión a la base de datos
if ($conexionDB->abrir()) {
    // Realizar la consulta a la base de datos
    $consulta = "SELECT ID_ESPECIALIDAD, NOMBRE_ESPECIALIDAD FROM ESPECIALIDAD";
    $conexionDB->consultar($consulta);

    // Obtener el resultado de la consulta
    $resultado = $conexionDB->obtenerResult();

    // Verificar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        $especialidades = array();

        // Recorrer los resultados y almacenar en un array asociativo
        while ($fila = $resultado->fetch_assoc()) {
            $especialidades[] = array(
                'id' => $fila['ID_ESPECIALIDAD'],
                'nombre' => $fila['NOMBRE_ESPECIALIDAD']
            );
        }

        // Devolver los resultados en formato JSON
        echo json_encode($especialidades);
    } else {
        // No se encontraron resultados
        echo json_encode(array('mensaje' => 'No hay especialidades disponibles.'));
    }

    // Cerrar la conexión a la base de datos
    $conexionDB->cerrar();
} else {
    // No se pudo abrir la conexión a la base de datos
    echo json_encode(array('error' => 'No se pudo abrir la conexión a la base de datos.'));
}
?>

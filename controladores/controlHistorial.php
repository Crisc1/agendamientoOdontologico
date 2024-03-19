<?php
include '../clases/claseHistorial.php';
include '../modelo/modeloHistorial.php';

// Obtener el contenido JSON del cuerpo de la solicitud
$json_data = file_get_contents("php://input");

// Decodificar el JSON en un array asociativo
$data = json_decode($json_data, true);

if (isset($data['odontograma'])) {
    try {
        $odontograma = $data['odontograma'];

        // Obtener datos específicos del odontograma
        foreach ($odontograma as $item) {
            // Verificar si es la hora y minutos
            if (isset($item['horaYMinutos'])) {
                $horaYMinutos_odontograma = $item['horaYMinutos'];
                // Puedes hacer lo que necesites con la hora y los minutos
                echo "Hora del odontograma: $horaYMinutos_odontograma";
            } else {
                // Si no es la hora, son los otros datos (nombreDiente y comentario)
                $id_diente = $item['nombreDiente'];
                $comentario = $item['comentario'];

                // Combina el id_diente y el comentario en una sola variable
                $comentarios = "$id_diente - $comentario";

                // Asegúrate de definir $Fecha_odontograma antes de usarla
                $Fecha_odontograma = ''; // Puedes asignar un valor por defecto o obtenerla de alguna manera

                // Crear instancia de la claseHistorial y llamar al método odontograma
                $odontogramaAdulto = new claseHistorial();
                $odontogramaAdulto->odontograma($comentarios, $Fecha_odontograma);

                // Luego, si es necesario, puedes registrar el odontograma en tu modelo
                $regOdontograma = new modeloHistorial();
                $regOdontograma->regOdontogramaAdulto($comentarios, $Fecha_odontograma);
            }
        }

        echo json_encode(['success' => true, 'message' => 'Odontograma(s) guardado(s) con éxito']);
    } catch (Exception $exc) {
        // Enviar una respuesta JSON de error
        echo json_encode(['success' => false, 'message' => 'Error al procesar el odontograma']);
    }
} else {
    // Enviar una respuesta JSON de error si no se proporciona el odontograma
    echo json_encode(['success' => false, 'message' => 'Llenar todos los campos']);
}
?>
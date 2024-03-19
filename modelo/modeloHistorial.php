<?php
include '../controladores/ConexionDB.php';

class modeloHistorial
{
    public function regOdontogramaAdulto($documento_paciente, $Fecha_odontograma, $comentarios)
    {
        try {
            $conexion = new conexionDB();
            $conexion->abrir();

            // Puedes imprimir los valores recibidos aquí
            echo "Documento Paciente: $documento_paciente<br>";
            echo "Fecha Odontograma: $Fecha_odontograma<br>";
            echo "Comentario: $comentarios<br>";

            // Ahora, puedes utilizar estos valores en tu consulta SQL
            $sql = "INSERT INTO ODONTOGRAMA (Documento_paciente, Fecha_odontograma, Comentario) VALUES ('$documento_paciente', '$Fecha_odontograma', '$comentario')";
            $conexion->consultar($sql);

            $result = $conexion->obtenerResult();
            $conexion->cerrar();

            return $result;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}
?>
<?php
include '../clases/Clasehistorial.php';

// Obtener el contenido JSON del cuerpo de la solicitud
$json_data = file_get_contents("php://input");

// Decodificar el JSON en un array asociativo
$data = json_decode($json_data, true);

if(isset($data['listaAgregadosUl'])){
    try {
        $odontograma = $data['listaAgregadosUl'];
        $odontogramaAdulto=new Clasehistorial();
        $odontogramaAdulto->odontograma($docume, $tipo_documento, $nombre, $apellido, $fecha_nacimiento, $telefono, $correo, $direccion, $contrasena);
        $regPersona=new modeloRegistro();
        $regPersona->regPersona($persona);
    } catch (Exception $exc) {
        echo 'Error: ', $exc->getMessage();
    }
} else {
    $alerta = "Llenar todos los campos";
    echo "alert('".$alerta."');";
}
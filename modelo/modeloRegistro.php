<?php
include '../controladores/ConexionDB.php';
class modeloRegistro{
        public function regPersona(persona $regPersona) {
   try {
        $conexion = new ConexionDB();
        $conexion->abrir();
        $documento= $regPersona->getDocumento();
        $nombre = $regPersona->getNombre();
        $apellido = $regPersona->getApellido();
        $telefono = $regPersona->getTelefono();
        $tipo_documento = $regPersona->getTipo_documento();
        $fecha_nacimiento = $regPersona->getFecha_nacimiento();
        $correo = $regPersona->getCorreo();
        $direccion = $regPersona->getDireccion();
        $contrasena = $regPersona->getContrasena();
        $sql = "INSERT INTO persona VALUES ('$documento','$tipo_documento','$nombre','$apellido','$fecha_nacimiento','$telefono','$correo','$direccion','$contrasena',null)";
        $conexion->consultar($sql);

        $res = $conexion->obtenerFilasAfectadas();

    $response = array();

    if ($res == 1) {
        // Después de insertar en la base de datos con éxito
        $response['status'] = 'success';
        $response['message'] = 'Persona registrada exitosamente.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error al registrar la persona.';
    }

    echo json_encode($response);
    $conexion->cerrar();
} catch (Exception $exc) {
    $response['status'] = 'error';
    $response['message'] = $exc->getMessage();
    echo json_encode($response);
}
        }
    

    
    public function consultarClientes($documento) {
        try{
            $conexion = new ConexionDB();
            $conexion->abrir();
            $sql= "select * from usuario where documento=$documento";
            $conexion->consultar($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function eliminarClientes($documento) {
        try{
            $conexion = new ConexionDB();
            $conexion->abrir();
            $sql = "delete from usuario where doc=$documento";
            $conexion->consultar($sql);
            $result = $conexion->obtenerResult();
            if($result != 0){
                print 'Registro Eliminado';
                } else{
                    print 'Registro no encontrado';
                }
            $conexion->cerrar();
            return $result;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
}

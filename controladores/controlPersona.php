<?php
include'../clases/persona.php';
include'../modelo/modeloRegistro.php';        
if(isset($_POST['documento'])&&isset($_POST['tipo_documento'])&&isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['fecha_nacimiento'])&&isset($_POST['telefono'])&&isset($_POST['correo'])&&isset($_POST['direccion'])&&isset($_POST['contrasena'])){
    try {
        $documento=$_POST['documento'];
        $tipo_documento=$_POST['tipo_documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $contrasena = $_POST['contrasena'];
        $persona=new persona();
        $persona->persona($documento, $tipo_documento, $nombre, $apellido, $fecha_nacimiento, $telefono, $correo, $direccion, $contrasena);
        $regPersona=new modeloRegistro();
        $regPersona->regPersona($persona);
    } catch (Exception $exc) {
        echo 'Error', $exc();
    }
}
    else if(isset($_POST['consultarClientes'])){
        try {
            $documento=$_POST['consultarClientes'];
            $personal = new pacientes();
            $personal->consultarNit($documento);
            $consultarCliente=new modeloRegistro();
            $result=$consultarCliente->consultarClientes($personal->getDoc());
            require '../vista/salidas/respuestaConsulta.php';
        } catch (Exception $exc) {
        echo 'Error:'. $exc;
        }
    }
    
    else if(isset ($_POST['eliminardocumento'])){
        try{
            $doc = $_POST['eliminardocumento'];
            $personal = new pacientes();
            $personal->consultarNit($documento);
            $eliCliente = new modeloRegistro();
            $result = $eliCliente->eliminarClientes($documento);           
        } catch (Exception $exc) {
        echo 'Error:'. $exc;
        }
    }



else{
    $alerta="Llenar todos los campos";
    echo "alert('".$alerta."');";
}

<?php
include '../clases/claseCitas.php';  
include '../modelo/modeloCitas.php';

if(isset($_POST['profesional'])&&isset($_POST['documento'])&&isset($_POST['tratamiento'])&&isset($_POST['fecha'])&&isset($_POST['hora'])&&isset($_POST['consultorio'])){
    try {
        $idProfesional=$_POST['profesional'];
        $documento=$_POST['documento'];
        $idTratamiento=$_POST['tratamiento'];
        $fecha=$_POST['fecha'];
        $hora = $_POST['hora'];
        $consultorio = $_POST['consultorio'];
        $cita=new claseCitas();
        $cita->agendarCita($idProfesional, $documento, $idTratamiento, $fecha, $hora, $consultorio);
        $regCita=new modeloCitas();
        $regCita->regCita($cita);
    } catch (Exception $exc) {
        echo 'Error', $exc();
    }
}
    else if(isset($_POST['documento'])){
        try {
            $documento = $_POST['documento'];
            $cita = new citas();
            $cita->consultarCitas($documento);
            $consultarCita=new modeloCitas();
            $result=$consultarCita->consultarCita($cita->getDocumento());
            require '../vista/paciente/gestionCitas.php';
        } catch (Exception $exc) {
        echo 'Error:'. $exc;
        }
    }
    
        //Condicional para la consulta de agenda para el profesional
    else if(isset($_POST['idProfesionalAgenda'])){
        try {
            $idProfesional = $_POST['idProfesionalAgenda'];
            $cita = new claseCitas();
            $cita->consultarAgendas($idProfesional);
            $consultarAgenda=new modeloCitas();
            $result=$consultarAgenda->consultarAgenda($cita->getIdProfesional());
            require '../vista/odontologo/agendaOdontologicaDia.php';
        } catch (Exception $exc) {
        echo 'Error:'. $exc;
        }
    }
    
    if (isset($_GET['action']) && $_GET['action'] === 'eliminar') {
        if (isset($_GET['idCita'])) {
            $idCitaEliminar = $_GET['idCita'];

            // Crear una instancia del modelo de citas
            $modeloCitas = new modeloCitas();

            // Llamar al método eliminarCita
            $resultado = $modeloCitas->eliminarCita($idCitaEliminar);

            // Enviar una respuesta al cliente para indicar el estado de la eliminación
            echo $resultado ? 'success' : 'error';
            exit();
        }
    }

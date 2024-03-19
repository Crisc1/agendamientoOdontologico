<?php
include '../controladores/ConexionDB.php';
class modeloCitas{
        public function regCita(claseCitas $regCita) {
        try {
            $conexion = new ConexionDB();
            $conexion->abrir();  
            $idProfesional= $regCita->getIdProfesional();
            $documento = $regCita->getDocumento();
            $idTratamiento = $regCita->getIdTratamiento();
            $fecha = $regCita->getFecha();
            $hora = $regCita->getHora();
            #$consultorio = $regCita->getConsultorio();
            $sql = "insert into cita values('null','$idProfesional','$documento','$idTratamiento','$fecha','$hora','1')";
            $conexion->consultar($sql);
            $res = $conexion->obtenerFilasAfectadas();
            if ($res == 1) {
                header("Location: ../vista/salidas/paginaExito.php"); 
                exit();    
            }else{
                header("Location: ../vista/salidas/paginaError.php"); 
                exit();  
            }  
            $conexion->cerrar();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function consultarCita($documento) {
         
        try{
            $conexion = new ConexionDB();
            $conexion->abrir();      
            $sql= "SELECT 
                    CITA.ID_CITA, 
                    CITA.FECHA, 
                    CITA.HORA, 
                    PROFESIONAL.ID_PROFESIONAL,  
                    CONCAT(PERSONA.NOMBRE, ' ', PERSONA.APELLIDO) AS NOMBRE_PROFESIONAL,
                    TRATAMIENTO.NOMBRE_TRATAMIENTO AS NOMBRE_TRATAMIENTO, 
                    CONSULTORIO.NUMERO_CONSULTORIO
                FROM CITA
                JOIN PROFESIONAL ON CITA.ID_PROFESIONAL = PROFESIONAL.ID_PROFESIONAL
                JOIN PERSONA ON PROFESIONAL.DOCUMENTO = PERSONA.DOCUMENTO
                LEFT JOIN TRATAMIENTO ON CITA.ID_TRATAMIENTO = TRATAMIENTO.ID_TRATAMIENTO
                LEFT JOIN CONSULTORIO ON CITA.ID_CONSULTORIO = CONSULTORIO.ID_CONSULTORIO
                WHERE CITA.DOCUMENTO_PACIENTE = $documento
                    AND CITA.FECHA >= CURDATE() -- Solo fechas mayores o iguales a la actual
                ORDER BY CITA.FECHA";
            $conexion->consultar($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function consultarAgenda($idProfesional) {
         
        try{
            $conexion = new conexionDB();
            $conexion->abrir();      
            $sql= "SELECT 
                        CITA.ID_CITA, 
                        CITA.FECHA, 
                        CITA.HORA, 
                        PACIENTE.DOCUMENTO AS DOCUMENTO_PACIENTE,
                        PROFESIONAL.ID_PROFESIONAL,  
                        CONCAT(PACIENTE.NOMBRE, ' ', PACIENTE.APELLIDO) AS NOMBRE_PACIENTE,
                        TRATAMIENTO.NOMBRE_TRATAMIENTO AS NOMBRE_TRATAMIENTO, 
                        CONSULTORIO.NUMERO_CONSULTORIO
                        FROM CITA
                        JOIN PROFESIONAL ON CITA.ID_PROFESIONAL = PROFESIONAL.ID_PROFESIONAL
                        JOIN PERSONA AS PACIENTE ON CITA.DOCUMENTO_PACIENTE = PACIENTE.DOCUMENTO
                        LEFT JOIN TRATAMIENTO ON CITA.ID_TRATAMIENTO = TRATAMIENTO.ID_TRATAMIENTO
                        LEFT JOIN CONSULTORIO ON CITA.ID_CONSULTORIO = CONSULTORIO.ID_CONSULTORIO
                        WHERE CITA.ID_PROFESIONAL = $idProfesional
                        AND CITA.FECHA >= CURDATE() -- Solo fechas mayores o iguales a la actual
                        ORDER BY CITA.FECHA;";
            $conexion->consultar($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function eliminarCita($idCita) {
        try{
            $conexion = new ConexionDB();
            $conexion->abrir();      
            $sql= "DELETE FROM CITA WHERE ID_CITA = $idCita";
            $conexion->consultar($sql);
            $result = $conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }   
}


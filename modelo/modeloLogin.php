<?php
session_start();
include '../controladores/conexionDB.php';

// Conectar a la base de datos
$conexion = new conexionDB();
$conexion->abrir();

$documento = $_POST['documento'];
$contrasena = $_POST['contrasena'];

$query = "SELECT ID_ROL, DOCUMENTO, NOMBRE, APELLIDO FROM PERSONA WHERE DOCUMENTO = '$documento' AND CONTRASENA = '$contrasena'";
$conexion->consultar($query);
$resultado = $conexion->obtenerResult();

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['ID_ROL'] = $row['ID_ROL'];
        $_SESSION['DOCUMENTO'] = $row['DOCUMENTO'];
        $_SESSION['NOMBRE'] = $row['NOMBRE'];
        $_SESSION['APELLIDO'] = $row['APELLIDO'];
    
    if ($_SESSION['ID_ROL'] === '3') {
        $query = "SELECT ID_PROFESIONAL FROM PROFESIONAL WHERE DOCUMENTO = '$documento'";
        $conexion->consultar($query);
        $resultado = $conexion->obtenerResult();

        if ($resultado->num_rows > 0) {
            // Si hay resultados, obtener la fila
            $row = $resultado->fetch_assoc();
            $_SESSION['ID_PROFESIONAL'] = $row['ID_PROFESIONAL'];

            // Imprimir el ID_PROFESIONAL
            echo 'ID_PROFESIONAL: ' . $_SESSION['ID_PROFESIONAL'];
        }
    }

    //Redirigir según el rol
    if ($_SESSION['ID_ROL'] === '1') {
        header("Location: ../vista/menus/menuAdministrador.php");
    } elseif ($_SESSION['ID_ROL'] === '2') {
        echo'Rol 2';
        //header("Location: ../vista/menus/menuRecepcion.php");
    } elseif ($_SESSION['ID_ROL'] === '3') {
        header("Location: ../vista/menus/menuOdontologo.php");
    } elseif ($_SESSION['ID_ROL'] === '4') {
        echo'Rol 4';
        //header("Location: ../vista/menus/menuAdmin.php");
    } elseif ($_SESSION['ID_ROL'] === '5') {
        header("Location: ../vista/menus/menuPaciente.php");
    } else {
        header("Location: interfaz_invitado.php");
    }
} else {
    echo "Usuario o contraseña incorrectos";
}

// Cerrar la conexión
$conexion->cerrar();
?>
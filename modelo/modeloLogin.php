<?php
session_start();
include '../controladores/ConexionDB.php';

// Conectar a la base de datos
$conexion = new ConexionDB();
$conexion->abrir();

$documento = $_POST['documento'];
$contrasena = $_POST['contrasena'];

$query = "SELECT ID_ROL, DOCUMENTO, NOMBRE, APELLIDO FROM PERSONA WHERE DOCUMENTO = '$documento' AND CONTRASENA = '$contrasena'";
echo "",$query;
$conexion->consultar($query);
$resultado = $conexion->obtenerResult();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $_SESSION['ID_ROL'] = $row['ID_ROL'];
    $_SESSION['DOCUMENTO'] = $row['DOCUMENTO'];
    $_SESSION['NOMBRE'] = $row['NOMBRE'];
    $_SESSION['APELLIDO'] = $row['APELLIDO'];

    // Redirigir según el rol
    if ($_SESSION['ID_ROL'] === '1') {
        header("Location: ../vista/menus/menuUsuario.php");
    } elseif ($_SESSION['ID_ROL'] === '2') {
        header("Location: ../vista/menus/menuAdmin.php");
    } elseif ($_SESSION['ID_ROL'] === '3') {
        header("Location: ../vista/menus/menuAdmin.php");
    } elseif ($_SESSION['ID_ROL'] === '4') {
        header("Location: ../vista/menus/menuAdmin.php");
    } elseif ($_SESSION['ID_ROL'] === '5') {
        header("Location: ../vista/menus/menuUsuario.php");
    } else {
        header("Location: interfaz_invitado.php");
    }
} else {
    echo "Usuario o contraseña incorrectos";
}

// Cerrar la conexión
$conexion->cerrar();
?>
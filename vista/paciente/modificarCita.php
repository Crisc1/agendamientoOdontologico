<?php
session_start();

if (isset($_SESSION['DOCUMENTO'])) {
    $documento = $_SESSION['DOCUMENTO'];
    $nombre = $_SESSION['NOMBRE'];
    $apellido = $_SESSION['APELLIDO'];
} else {
    header('Location: ../salidas/errorAccesoSinLogin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Cita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('../..//imagenes/backGroundLogin.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        div {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div>
        <h1>Editar Cita</h1>
        <form action="procesar_edicion.php" method="post">
            <label for="nombresyapellidos">Odontólogo:</label>
            <input type="text" name="nombresyapellidos" value="<?php echo $cita['nombresyapellidos']; ?>" required>

            <label for="tipo_cita">Tipo de Cita:</label>
            <input type="text" name="tipo_cita" value="<?php echo $cita['tipo_cita']; ?>" required>

            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" value="<?php echo $cita['fecha']; ?>" required>

            <label for="hora">Hora:</label>
            <input type="time" name="hora" value="<?php echo $cita['hora']; ?>" required>

            <label for="consultorio">Consultorio:</label>
            <input type="text" name="consultorio" value="<?php echo $cita['consultorio']; ?>" required>

            <!-- Puedes agregar más campos según sea necesario -->

            <input type="hidden" name="cod_cita" value="<?php echo $cod_cita; ?>">

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>

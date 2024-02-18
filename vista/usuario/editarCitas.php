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
    <title>Lista de Citas</title>
    <link rel="stylesheet" href="../assets/css/styleEditarCitas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script>
    function editarCita(idCita) {
        window.location.href = 'editar_cita.php?id=' + idCita;
    }

    function confirmarEliminar(idCita) {
        var confirmacion = confirm('¿Estás seguro de que deseas eliminar esta cita?');

        if (confirmacion) {
            // Llamar a la función de eliminación
            eliminarCita(idCita);
        }
    }

    function eliminarCita(idCita) {
        // Utilizar AJAX para enviar la solicitud de eliminación al servidor
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var respuesta = xhr.responseText;
                    if (respuesta === 'success') {
                        alert('Cita eliminada con éxito.');
                        location.reload();
                    } else {
                        alert('Error al eliminar la cita.');
                    }
                } else {
                    alert('Error en la solicitud al servidor.');
                }
            }
        };

        // Enviar la solicitud POST al script de eliminación
        xhr.open('POST', '../controladores/ControlCitas.php?action=eliminar&idCita=' + idCita, true);
        xhr.send();
    }
</script>
</head>
<body>
    <div>
        <h1>Lista de Citas</h1>
        <?php
        // Crear una instancia del modelo de cita
        $modeloCitas = new modeloCitas();

        // Si se recibió un ID para eliminar
        if (isset($_GET['action']) && $_GET['action'] === 'eliminar') {
            if (isset($_GET['idCita'])) {
                $idCitaEliminar = $_GET['idCita'];

                // Llamar al método eliminarCita
                $resultado = $modeloCitas->eliminarCita($idCitaEliminar);

                // Enviar una respuesta al cliente para indicar el estado de la eliminación
                echo $resultado ? 'success' : 'error';
                exit();
            }
        }

        // Si no se está eliminando, obtener la lista de citas
        $result = $modeloCitas->consultarCita($documento);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Mostrar la tabla con los detalles de las citas
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Odontologo</th>
                        <th>Tipo de Cita</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Consultorio</th>
                        <th>Acciones</th>
                    </tr>";

            while ($fila = $result->fetch_object()) {
                echo "<tr>
                        <td>{$fila->ID_CITA}</td>
                        <td>{$fila->NOMBRE_PROFESIONAL}</td>
                        <td>{$fila->NOMBRE_TRATAMIENTO}</td>
                        <td>{$fila->FECHA}</td>
                        <td>{$fila->HORA}</td>
                        <td>{$fila->NUMERO_CONSULTORIO}</td>
                        <td>
                            <button class='btn editar-btn' onclick='editarCita({$fila->ID_CITA})'>Editar</button>
                            <button class='btn eliminar-btn' onclick='confirmarEliminar({$fila->ID_CITA})'>Eliminar</button>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No hay citas disponibles.";
        }
        ?>
    </div>
</body>
</html>

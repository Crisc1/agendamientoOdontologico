<?php
$conexion = mysqli_connect("localhost", "root", "", "bd_odontologia");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$insumos = array(
    array('id' => 1, 'nombre' => 'Brackets', 'cantidad' => 100, 'unidad' =>
'cajas'),
    array('id' => 2, 'nombre' => 'Arcos', 'cantidad' => 50, 'unidad' =>
'paquetes'),
    array('id' => 3, 'nombre' => 'Ligaduras', 'cantidad' => 200, 'unidad'
=> 'paquetes'),
    array('id' => 4, 'nombre' => 'Curetas', 'cantidad' => 30, 'unidad' =>
'unidades'),
    array('id' => 5, 'nombre' => 'Sondas', 'cantidad' => 20, 'unidad' =>
'unidades'),
    array('id' => 6, 'nombre' => 'Difusores de agua', 'cantidad' => 50,
'unidad' => 'unidades'),
    array('id' => 7, 'nombre' => 'Limas', 'cantidad' => 100, 'unidad' =>
'cajas'),
    array('id' => 8, 'nombre' => 'Conos de gutapercha', 'cantidad' => 50,
'unidad' => 'cajas'),
    array('id' => 9, 'nombre' => 'Sealer', 'cantidad' => 10, 'unidad' =>
'frascos'),
    array('id' => 10, 'nombre' => 'Bisturíes', 'cantidad' => 20, 'unidad'
=> 'unidades'),
    array('id' => 11, 'nombre' => 'Elevadores', 'cantidad' => 15, 'unidad'
=> 'unidades'),
    array('id' => 12, 'nombre' => 'Fórceps', 'cantidad' => 25, 'unidad' =>
'unidades'),
    array('id' => 13, 'nombre' => 'Anestesia pediátrica', 'cantidad' => 10,
'unidad' => 'frascos'),
    array('id' => 14, 'nombre' => 'Fresas pediátricas', 'cantidad' => 50,
'unidad' => 'unidades'),
    array('id' => 15, 'nombre' => 'Sellantes', 'cantidad' => 5, 'unidad' =>
'frascos'),
    array('id' => 16, 'nombre' => 'Implantes dentales', 'cantidad' => 20,
'unidad' => 'unidades'),
    array('id' => 17, 'nombre' => 'Tornillos de fijación', 'cantidad' =>
30, 'unidad' => 'unidades'),
    array('id' => 18, 'nombre' => 'Membranas de colágeno', 'cantidad' => 5,
'unidad' => 'paquetes'),
    array('id' => 19, 'nombre' => 'Blanqueadores dentales', 'cantidad' =>
10, 'unidad' => 'kits'),
    array('id' => 20, 'nombre' => 'Composite estético', 'cantidad' => 20,
'unidad' => 'jeringas'),
    array('id' => 21, 'nombre' => 'Anestesia general', 'cantidad' => 5,
'unidad' => 'frascos'),
    array('id' => 22, 'nombre' => 'Composite', 'cantidad' => 30, 'unidad'
=> 'jeringas'),
    array('id' => 23, 'nombre' => 'Conos de gutapercha', 'cantidad' => 50,
'unidad' => 'cajas'),
    array('id' => 24, 'nombre' => 'Sealer', 'cantidad' => 10, 'unidad' =>
'frascos'),
    array('id' => 25, 'nombre' => 'Bisturíes', 'cantidad' => 20, 'unidad'
=> 'unidades')
);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    foreach ($insumos as $key => $insumo) {
        if (isset($_POST['cantidad'][$key])) {
            $cantidad = intval($_POST['cantidad'][$key]);
            $insumos[$key]['cantidad'] = $cantidad;

            // Actualizar la cantidad en la base de datos
            $id = $insumo['id'];
            $cantidad = $insumos[$key]['cantidad'];
            $sql = "UPDATE Insumos SET Cantidad = $cantidad WHERE ID = $id";
            mysqli_query($conexion, $sql);
        }
    }
    $mensaje_actualizacion = "¡Insumos actualizados!";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROL DE INSUMOS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('../..//assets/imagenes/backGroundLogin.jpg')
no-repeat center center fixed;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            position: relative;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 60px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .quantity-input {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input[type="number"] {
            width: 50px;
            text-align: center;
        }
        .quantity-control {
            display: flex;
            flex-direction: column;
            margin-left: 10px;
        }
        button {
            padding: 5px 10px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .update-button {
            text-align: center;
            margin-top: 20px;
        }
        .update-message {
            color: green;
            font-weight: bold;
            font-size: 1.2em;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Control de Insumos</h1>
        <form action="" method="post">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($insumos as $key => $insumo): ?>
                    <tr>
                        <td><?php echo $insumo['id']; ?></td>
                        <td><?php echo $insumo['nombre']; ?></td>
                        <td class="quantity-input">
                            <button type="button" class="quantity-control"
onclick="this.parentNode.querySelector('input[type=number]').stepDown();">-</button>
                            <input type="number" name="cantidad[<?php echo
$key; ?>]" value="<?php echo $insumo['cantidad']; ?>" min="0">
                            <button type="button" class="quantity-control"
onclick="this.parentNode.querySelector('input[type=number]').stepUp();">+</button>
                        </td>
                        <td><?php echo $insumo['unidad']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="update-button">
                <button type="submit" name="actualizar">Actualizar</button>
            </div>
        </form>
        <?php if (isset($mensaje_actualizacion)): ?>
        <div class="update-message">
            <?php echo $mensaje_actualizacion; ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
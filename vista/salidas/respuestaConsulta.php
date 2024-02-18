<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Consulta</title>
</head>
<body>
    <div>
        <h1>Resultado consulta</h1>
    </div>
    <div>
        <form action="../../../controladores/controlPacientes.php" method="post">
            <div>
                <?php$fila = $result->fetch_object();?>
                <label for="doc">Documento:</label>
                <input type="text" id="doc" name="doc" value="<?php echo $fila->cod_doc; ?>">
            </div>
            <div>
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $fila->nombres; ?>" disabled>
            </div>
            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $fila->apellidos; ?>" disabled>
            </div>
            <div>
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $fila->telefono; ?>" disabled>
            </div>
            <div>
                <label for="tipo_doc">Tipo_doc:</label>
                <input type="text" id="tipo_doc" name="tipo_doc" value="<?php echo $fila->tipo_doc; ?>" disabled>
            </div>
            <div>
                <label for="fecha_nac">Fecha_nac:</label>
                <input type="text" id="fecha_nac" name="fecha_nac" value="<?php echo $fila->fecha_nac; ?>" disabled>
            </div>
            <div>
                <label for="correo">Correo:</label>
                <input type="text" id="correo" name="correo" value="<?php echo $fila->correo; ?>" disabled>
            </div>
            <div>
                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $fila->direccion; ?>" disabled>
            </div>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>

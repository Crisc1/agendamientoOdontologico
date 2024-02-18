<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            background: url('../..//imagenes/backGroundLogin.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #87ceeb;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px; /* Ajustar el ancho del formulario según tus necesidades */
            width: 100%;
            margin: auto; /* Centrar el formulario */
        }

        h1 {
            color: #007bff;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="../../../controladores/controlPacientes.php" method="post">
        <h1>REGISTRO</h1>
        <label for="nombres">Nombres:</label>
        <input name="nombres" id="nombres" required>
        <br><br>
        <label for="apellidos">Apellidos:</label>
        <input name="apellidos" id="apellidos" required>
        <br><br>
        <label for="telefono">Telefono:</label>
        <input type="telefono" name="telefono" id="telefono" required>
        <br><br>
        <label for="tipodoc">Tipo de documento:</label>
        <select name="tipodoc" id="tipodoc" required>
            <option value=""></option>
            <option value="Cedula De Cuidadania">Cedula de Ciudadania</option>
            <option value="Cedula De Extranjeria">Cedula de Extranjeria</option>
            <option value="Tarjeta De Identidad">Tarjeta de Identidad</option>
            <option value="Registro Civil">Registro Civil</option>
            <option value="Pasaporte">Pasaporte</option>
        </select>
        <br><br>
        <label for="doc">Numero de documento:</label>
        <input type="number" name="doc" id="doc" required>
        <br><br>
        <label for="fecha_nac">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nac" id="fecha_nac" required>
        <br><br>
        <label for="correo">Correo electronico:</label>
        <input type="email" name="correo" id="correo" required>
        <br><br>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion" required>
        <br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="text" name="contrasena" id="contrasena" required>
        <br><br>
        <label for="rol">Rol:</label>
        <select name="rol" id="rol">
            <option value="1">1</option>
        </select>
        <br><br>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>

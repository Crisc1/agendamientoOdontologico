<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Iniciar sesión</title>
    <style>
        body {
            background: url('../assets/imagenes/backGroundLogin.jpg') no-repeat center center fixed;
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
        }

        h2 {
            color: #007bff;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
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
            margin-bottom: 10px; /* Mover el botón Iniciar Sesión hacia abajo */
        }

        button:hover {
            background-color: #0056b3;
        }

        #btnRegistro {
            background-color: #28a745;
            color: #fff;
        }

        #btnRegistro:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form action="../modelo/modeloLogin.php" method="post">
        <h2>Iniciar sesión</h2>
        <label for="documento">Documento:</label>
        <input type="text" id="documento" name="documento" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <br>
        <button type="submit">Iniciar sesión</button>
        <br>
        <button id="btnRegistro" type="button" onclick="window.location.href='../usuario/registro.php';">Registrarse</button>
    </form>
</body>
</html>

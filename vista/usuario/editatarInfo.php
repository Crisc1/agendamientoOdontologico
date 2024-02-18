<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Cliente</title>
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

        form {
            max-width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-consultar {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-consultar:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div>
        <h1>Consultar Cliente</h1>
        <form id="frmconsultar" action="../../../controladores/controlCitas.php" method="post">
            <label for="hora">Número de documento:</label>
            <input type="time" name="hora" id="hora">
            
            <br><br>
            
            <button type="submit" class="btn-consultar">Consultar</button>
        </form>
    </div>
</body>
</html>

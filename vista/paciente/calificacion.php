<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleEditarCitas.css">
    <title>Calificación de Servicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('../..//assets/imagenes/backGroundLogin.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
            margin-top: 0;
        }
         h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
            margin-top: 0;
        }
        form {
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .stars {
            display: flex;
            justify-content: center;
            direction: rtl;
        }
        label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }
        input[type="radio"] {
            display: none;
        }
        label:hover,
        label:hover ~ label {
            color: orange;
        }
        input[type="radio"]:checked ~ label {
            color: orange;
        }
        textarea {
            width: 100%;
            height: 100px;
            margin-top: 10px;
            padding: 5px;
            resize: vertical;
            color: blue;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Calificación de Servicio</h1>
    <form action="procesarCalificacion.php" method="post">
        <div class="stars">
            <input type="radio" name="calificacion" id="star5" value="5">
            <label for="star5">★</label>
            <input type="radio" name="calificacion" id="star4" value="4">
            <label for="star4">★</label>
            <input type="radio" name="calificacion" id="star3" value="3">
            <label for="star3">★</label>
            <input type="radio" name="calificacion" id="star2" value="2">
            <label for="star2">★</label>
            <input type="radio" name="calificacion" id="star1" value="1">
            <label for="star1">★</label>
        </div>
        <h2 for="Sugerencia">Sugerencia:</h2>
        <textarea name="Sugerencia" id="Sugerencia" placeholder="Escribe tu sugerencia..."></textarea>
        <button type="submit">Enviar</button>
    </form>

    <script>
        // JavaScript para redireccionar después de enviar el formulario
        document.querySelector('form').addEventListener('submit', function() {
            window.location.href = '/agendamientoOdontologico/vista/usuario/procesarCalificacion.php';
        });
    </script>
</body>
</html>

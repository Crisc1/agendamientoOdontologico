<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Popper.js -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <title>Registro</title>
    <style>
        body {
            background: url('../../assets/imagenes/backGroundLogin.jpg') no-repeat center center fixed;
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
        
        /* Estilos personalizados para los modales */
.modal-content {
    background-color: #f8f9fa; /* Color de fondo del contenido del modal */
    color: #343a40; /* Color del texto en el modal */
}

.modal-header {
    background-color: #007bff; /* Color de fondo del encabezado del modal */
    color: #fff; /* Color del texto en el encabezado del modal */
}

.modal-footer {
    background-color: #f8f9fa; /* Color de fondo del pie del modal */
}

    </style>
</head>
<body>
    <form action="../../controladores/controlPersona.php" method="post">
        <h1>REGISTRO</h1>
        <label for="nombre">Nombre:</label>
        <input name="nombre" id="nombre" required>
        <br><br>
        <label for="apellido">Apellido:</label>
        <input name="apellido" id="apellido" required>
        <br><br>
        <label for="telefono">Telefono:</label>
        <input type="telefono" name="telefono" id="telefono" maxlength="10" required>
        <br><br>
        <label for="tipo_documento">Tipo de documento:</label>
        <select name="tipo_documento" id="tipo_documento" required>
            <option value="1">Tarjeta de Identidad</option>
            <option value="2">Cedula de Ciudadania</option>
            <option value="3">Cedula de Extranjeria</option>
            <option value="4">Registro Civil</option>
            <option value="5">Pasaporte</option>
        </select>
        <br><br>
        <label for="documento">Numero de documento:</label>
        <input type="number" name="documento" id="documento" maxlength="10" required>
        <br><br>
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        <br><br>
        <label for="correo">Correo electronico:</label>
        <input type="email" name="correo" id="correo" required>
        <br><br>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion" required>
        <br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br><br>
        <button type="submit">Registrarse</button>
    </form>
    
<!-- Modal de éxito -->
<div class="modal fade" id="myModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Éxito</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Persona registrada exitosamente.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de error -->
<div class="modal fade" id="myModalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Error</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Error al registrar la persona.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    // Cerrar modales al hacer clic en la "x" o en el botón de cerrar
    $('#myModalSuccess, #myModalError').on('hidden.bs.modal', function () {
      // Limpiar el formulario al cerrar el modal (ajustar según la estructura de tu HTML)
      form.reset();
    });

    form.addEventListener('submit', function (event) {
      event.preventDefault(); // Evitar la recarga de la página

      fetch(form.action, {
        method: form.method,
        body: new FormData(form)
      })
      .then(response => response.json())
      .then(data => {
        console.log('Respuesta del servidor:', data);

        if (data.status === 'success') {
          // Mostrar modal de éxito
          $('#myModalSuccess').modal('show');
        } else {
          // Mostrar modal de error
          $('#myModalError').modal('show');
        }
      })
      .catch(error => {
        console.error('Error al enviar el formulario:', error);
      });
    });
  });
</script>

</body>
</html>

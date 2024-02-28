<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/styleMenuUsuario.css" />
    <title>Historial Odontológico</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .titulo{
            text-align: center;
            color: #3498db;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .volver-container {
            background-color: red;
            /* Fondo rojo */
            padding: 0px 10px 0px 10px;
            border-radius: 15px;
            /* Bordes redondeados */
        }

        .volver-link {
            color: white;
            /* Texto blanco */
            text-decoration: none;
            /* Sin subrayado */
        }

        .odontograma {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .seccion {
            display: flex;
            flex-direction: row;
            gap: 10px;
            width: 100%;
            /* Ocupar el 100% del ancho lateral */
            background-color: #333;
            /* Fondo gris oscuro */
            padding: 10px;
            border-radius: 10px;
        }

        .diente {
            position: relative;
            width: calc(6.25% - 10px);
            /* 6.25% del ancho con espacio entre ellas */
            height: 120px;
            border: 0px solid #000;
            overflow: hidden;
            cursor: pointer;
            user-select: none;
            background-color: #fff;
            /* Fondo blanco para los dientes */
            border-radius: 5px;
            padding: 5px;
        }

        .diente img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .diente-seleccionado::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 6px solid #007bff;
            box-sizing: border-box;
            pointer-events: none;
        }

        #infoSeleccion {
            margin-top: 20px;
        }

        #listaAgregados {
            margin-top: 20px;
            width: 80%;
            /* Puedes ajustar el porcentaje según tus necesidades */
            max-width: 800px;
            /* Opcional: Agrega un ancho máximo */
            margin-left: auto;
            /* Centra el contenedor a la izquierda */
            margin-right: auto;
            /* Centra el contenedor a la derecha */
            color: #3498db;
        }

        #listaAgregados h2 {
            margin-bottom: 10px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            padding: 10px;
        }

        #listaAgregados ul {
            list-style-type: none;
            padding: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .lista-item {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .nombre-diente {
            font-weight: bold;
            margin-right: 10px;
        }

        .eliminar-btn {
            width: 80px;
            /* Puedes ajustar el ancho según tus necesidades */
            padding: 8px;
            /* Puedes ajustar el padding según tus necesidades */
            background-color: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            /* Puedes ajustar el tamaño del texto según tus necesidades */
        }

        .eliminar-btn:hover {
            background-color: #c0392b;
        }

        .comentario {
            max-width: 100%;
            overflow: auto;
            white-space: normal;
            /* Puedes usar 'normal' o 'pre-wrap' según tus preferencias */
        }

        /* Estilos para el formulario */
        .form-container {
            max-width: 400px;
            margin: 20px auto;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Centro Odontológico</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="volver-container">
                        <a class="nav-link volver-link" href="#" onclick="goBack()">Volver</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="titulo">Odontograma</h1>

    <div class="odontograma">
        <!-- Sección 1 -->
        <div class="seccion" id="seccion1"></div>

        <!-- Sección 2 -->
        <div class="seccion" id="seccion2"></div>
    </div>

    <div id="infoSeleccion" class="form-container">
        <form id="comentarioForm">
            <label for="imagenSeleccionada">Imagen Seleccionada:</label>
            <input type="text" id="imagenSeleccionada" readonly>
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" rows="4"></textarea>
            <button type="button" onclick="agregarALista()">Añadir</button>
        </form>
    </div>

    <div id="listaAgregados" class="form-container">
        <h2>Lista de Agregados</h2>
        <ul id="listaAgregadosUl"></ul>
    </div>
    
    <div class="form-container">
        <button id="enviarOdontogramaBtn" onclick="enviarOdontograma()">Enviar Odontograma</button>
    </div>

    <script>
        function agregarALista() {
            const infoSeleccionada = document.getElementById('imagenSeleccionada');
            const comentarioInput = document.getElementById('comentario');
            const listaAgregadosUl = document.getElementById('listaAgregadosUl');

            const imagenID = infoSeleccionada.value;
            const comentario = comentarioInput.value.trim();

            if (comentario !== '' && imagenID !== '') {
                const listItem = document.createElement('li');
                listItem.classList.add('lista-item');

                const itemHeader = document.createElement('div');
                itemHeader.classList.add('item-header');

                const nombreDiente = document.createElement('span');
                nombreDiente.classList.add('nombre-diente');
                nombreDiente.textContent = imagenID;

                const eliminarBtn = document.createElement('button');
                eliminarBtn.classList.add('eliminar-btn');
                eliminarBtn.textContent = 'Eliminar';
                eliminarBtn.addEventListener('click', function () {
                    listItem.remove();
                });

                itemHeader.appendChild(nombreDiente);
                itemHeader.appendChild(eliminarBtn);

                listItem.appendChild(itemHeader);

                const comentarioDiv = document.createElement('div');
                comentarioDiv.classList.add('comentario');
                comentarioDiv.textContent = comentario;

                listItem.appendChild(comentarioDiv);

                listaAgregadosUl.appendChild(listItem);

                infoSeleccionada.value = '';
                comentarioInput.value = '';
            } else {
                alert('Por favor, seleccione una imagen y agregue un comentario antes de añadir.');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const seccionesImagenesDientes = [
                // Seccion 1/2
                ['seccion 1/18.png', 'seccion 1/17.png', 'seccion 1/16.png', 'seccion 1/15.png', 'seccion 1/14.png', 'seccion 1/13.png', 'seccion 1/12.png', 'seccion 1/1122.png', 'seccion 2/21.png', 'seccion 2/22.png', 'seccion 2/23.png', 'seccion 2/24.png', 'seccion 2/25.png', 'seccion 2/26.png', 'seccion 2/27.png', 'seccion 2/28.png'],
                // Carpeta 2
                ['seccion 4/48.png', 'seccion 4/47.png', 'seccion 4/46.png', 'seccion 4/45.png', 'seccion 4/44.png', 'seccion 4/43.png', 'seccion 4/42.png', 'seccion 4/41.png', 'seccion 3/31.png', 'seccion 3/32.png', 'seccion 3/33.png', 'seccion 3/34.png', 'seccion 3/35.png', 'seccion 3/36.png', 'seccion 3/37.png', 'seccion 3/38.png']
            ];

            const infoSeleccionada = document.getElementById('imagenSeleccionada');

            for (let i = 0; i < seccionesImagenesDientes.length; i++) {
                const seccion = document.getElementById(`seccion${i + 1}`);

                seccionesImagenesDientes[i].forEach((nombreImagen, index) => {
                    const diente = document.createElement('div');
                    diente.classList.add('diente');

                    const imagenDiente = document.createElement('img');
                    const imagenID = `diente-${i + 1}-${index + 1}`;
                    imagenDiente.id = imagenID;
                    imagenDiente.src = `../../assets/imagenes/odontograma/${nombreImagen}`;

                    diente.appendChild(imagenDiente);

                    diente.addEventListener('click', function () {
                        document.querySelectorAll('.diente').forEach(el => el.classList.remove('diente-seleccionado'));

                        diente.classList.add('diente-seleccionado');

                        infoSeleccionada.value = imagenID;
                    });

                    seccion.appendChild(diente);
                });
            }
        });
         
function enviarOdontograma() {
    const listaAgregadosUl = document.getElementById('listaAgregadosUl');

    // Obtener los datos del odontograma desde la lista de agregados
    const odontograma = [];
    const listaItems = listaAgregadosUl.getElementsByClassName('lista-item');

    for (let i = 0; i < listaItems.length; i++) {
        const nombreDiente = listaItems[i].getElementsByClassName('nombre-diente')[0].textContent;
        const comentario = listaItems[i].getElementsByClassName('comentario')[0].textContent;

        odontograma.push({ nombreDiente, comentario });
    }

    // Enviar los datos al servidor usando fetch y el método POST
    fetch('../../controladores/controlHistorial.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ listaAgregadosUl: odontograma }),  // Cambio aquí
    })
    .then(response => response.json())
    .then(data => {
        // Manejar la respuesta del servidor (puedes mostrar una alerta u otra acción)
        alert(data.message);
    })
    .catch(error => {
        console.error('Error al enviar el odontograma:', error);
    });
}

        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>

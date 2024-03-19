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

                // Agrega un console.log para mostrar la información seleccionada
                console.log('Imagen Seleccionada:', imagenID);
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

    // Obtener la fecha y hora local actual
    const fechaActual = new Date();
    const horaYMinutos = `${fechaActual.getHours()}:${fechaActual.getMinutes()}`;

    // Agregar la hora y minutos al objeto odontograma
    odontograma.push({ horaYMinutos });

    // Mostrar el contenido JSON antes de enviarlo
    const jsonToSend = JSON.stringify({ odontograma });
    console.log('Datos a enviar (JSON):', jsonToSend);

    // Enviar los datos al servidor usando fetch y el método POST
    fetch('../../controladores/controlHistorial.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: jsonToSend,
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

function confirmAsistencia(documentoPaciente) {
    // Mostrar ventana de confirmación
    var confirmacion = confirm('¿Deseas crear un odontograma para este paciente?');

    // Redirigir según la respuesta
    if (confirmacion) {
        window.location.href = '../vista/odontologo/menuOdontograma.php/?documento_paciente=' + documentoPaciente;
    } else {
        // Puedes redirigir a otra página o realizar alguna otra acción
        alert('No se creará un odontograma.');
    }
}

function inasistencia(documentoPaciente) {
    // Redirect to menuOdontograma.php with the documento_paciente parameter
    window.location.href = 'menuOdontograma.php?documento_paciente=' + documentoPaciente;
}
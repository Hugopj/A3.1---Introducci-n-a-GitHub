<?php

// Validar el nombre
function validarNombre($nombre) {
    $nombreMayusculas = strtoupper($nombre);
    return $nombre === $nombreMayusculas;
}

// Validar el correo
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validar los colores
function validarColores($colores) {
    return !empty($colores);
}


function intereses($intereses) {
    return !empty($intereses);



    
}

// Validar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $colores = isset($_POST["colores"]) ? $_POST["colores"] : array(); // Asegúrate de que colores sea un array incluso si no se selecciona ninguno
    $asignaturas = $_POST["asignaturas"];
    $intereses = isset($_POST["intereses"]) ? $_POST["intereses"] : array(); // Asegúrate de que intereses sea un array incluso si no se selecciona ninguno

    $errores = array();

    // Validar el nombre
    if (!validarNombre($nombre)) {
        $errores[] = "El nombre no está en mayúsculas.";
    }

    // Validar el correo electrónico
    if (!validarEmail($email)) {
        $errores[] = "El campo Correo Electrónico es incorrecto.";
    }

    // Validar al menos un color seleccionado
    if (!validarColores($colores)) {
        $errores[] = "Debes seleccionar al menos un color.";
    }
     // Validar al menos uno seleccionado
     if (!intereses($intereses)) {
        $errores[] = "Debes seleccionar al menos un interes.";
    }

    // Otras validaciones si las necesitas...

    // Mostrar errores o mensaje de éxito
    if (!empty($errores)) {
        // Error en el envío
        echo "<h2>Errores en el formulario:</h2>";
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // Formulario enviado con éxito
        echo "<h2>Formulario enviado con éxito</h2>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Correo Electrónico: $email</p>";
        echo "<p>Colores seleccionados: " . implode(", ", $colores) . "</p>";
        echo "<p>Asignaturas: $asignaturas</p>";
        echo "<p>Intereses: " . implode(", ", $intereses) . "</p>";
    }
} else {
    // El formulario no se ha enviado
    echo "El formulario no ha sido enviado.";
}

?>

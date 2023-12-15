<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sendForm"])) {
    // Verificar si todos los campos están completos
    if (!empty($_POST["name"]) && !empty($_POST["lastName"]) && !empty($_POST["home"]) && !empty($_POST["phone"]) && !empty($_POST["curp"]) && !empty($_POST["age"]) && !empty($_POST["studyLevel"])) {

        // Recoger los datos del formulario y limpiarlos
        $nombre = limpiarEntrada($_POST["name"]);
        $apellidos = limpiarEntrada($_POST["lastName"]);
        $domicilio = limpiarEntrada($_POST["home"]);
        $telefono = limpiarEntrada($_POST["phone"]);
        $curp = limpiarEntrada($_POST["curp"]);
        $edad = limpiarEntrada($_POST["age"]);
        $nivelEstudios = limpiarEntrada($_POST["studyLevel"]);

        // Manejar la foto de perfil
        if (!empty($_FILES["picture"]["name"])) {
            // Carpeta de almacenamiento
            $carpetaAlmacenamiento = "./uploads/";

            // Nombre del archivo con el formato especificado
            $nombreArchivo = $nombre . "." . $apellidos . "." . date("YmdHis") . "." . pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION);

            // Ruta completa del archivo
            $rutaCompleta = $carpetaAlmacenamiento . $nombreArchivo;

            // Mover el archivo al servidor
            move_uploaded_file($_FILES["picture"]["tmp_name"], $rutaCompleta);

            // Guardar la ruta completa en la base de datos
            $rutaBaseDatos = $rutaCompleta; // Puedes ajustar esto según la estructura de tu servidor
        } else {
            // Si no se proporciona una foto, se asigna un valor predeterminado
            $rutaBaseDatos = ""; // Valor predeterminado
        }

        // Conectar a la base de datos
        $conexion = new mysqli("localhost", "saidrexxx", "Demeneghi", "redes");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL utilizando sentencia preparada
        $consulta = "INSERT INTO usuarios (profile_picture, name, last_name, home, phone, curp, age, academic_grade) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la sentencia
        $sentencia = $conexion->prepare($consulta);

        // Vincular los parámetros utilizando sentencia preparada
        $sentencia->bind_param("ssssssis", $rutaBaseDatos, $nombre, $apellidos, $domicilio, $telefono, $curp, $edad, $nivelEstudios);

        // Ejecutar la sentencia
        $resultado = $sentencia->execute();

        // Verificar si la inserción fue exitosa
        if ($resultado) {
            header("Location: ./index.php");
        } else {
            echo "Error al insertar datos: " . $sentencia->error;
        }

        // Cerrar la conexión y la sentencia
        $sentencia->close();
        $conexion->close();

    } else {
        echo "Todos los campos son obligatorios. Por favor, completa el formulario.";
    }
}

// Función para limpiar las entradas y prevenir inyecciones
function limpiarEntrada($entrada) {
    $entrada = trim($entrada);
    $entrada = stripslashes($entrada);
    $entrada = htmlspecialchars($entrada);
    return $entrada;
}
?>

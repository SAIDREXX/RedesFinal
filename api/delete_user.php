<?php
require_once('../sql/db_connection.php');

// Obtener el nombre y apellido del usuario
$name = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
$lastName = htmlspecialchars($_GET['last_name'], ENT_QUOTES, 'UTF-8');



// Consulta para eliminar al usuario
$sqlDelete = "DELETE FROM usuarios WHERE name = ? AND last_name = ?";
//Consulta para obtener la ruta de la imagen
$sqlImageSRC = "SELECT profile_picture FROM usuarios WHERE name = ? AND last_name = ?";

$stmtImageSRC = $conn->prepare($sqlImageSRC);
$stmtImageSRC->bind_param('ss', $name, $lastName);

if ($stmtImageSRC->execute()) {
    // Obtener la ruta de la imagen
    $resultImageSRC = $stmtImageSRC->get_result();
    // Obtener la fila de la ruta de la imagen
    $rowImageSRC = $resultImageSRC->fetch_assoc();
    // Obtener el nombre de la imagen
    $imageSRC = $rowImageSRC['profile_picture'];
    // Elimina la imagen del servidor
    unlink($imageSRC); 

    // Ejecutar la consulta de eliminación
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param('ss', $name, $lastName);

    if ($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar el usuario: " . $stmt->error;
    }
} else {
    echo "Error al eliminar el usuario: " . $stmtImageSRC->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

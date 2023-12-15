<?php
$servername = "localhost";
$username = "saidrexxx";
$password = "Demeneghi";
$dbname = "redes";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}
?>

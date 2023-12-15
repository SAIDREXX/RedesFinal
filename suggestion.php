<?php
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "saidrexxx";
    $password = "Demeneghi";
    $dbname = "redes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el término de búsqueda
    $query = $conn->real_escape_string($_GET['q']);

    // Consulta a la base de datos
    $sql = "SELECT name, last_name FROM usuarios WHERE name LIKE '%$query%'";
    $result = $conn->query($sql);

    // Mostrar sugerencias
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>" . $row['name'] . " " . $row['last_name'] . "</div>";
        }
    } else {
        echo "No se encontraron resultados";
    }

    // Cerrar la conexión
    $conn->close();
?>

<?php
require_once('../sql/db_connection.php');

// Obtener el nombre del usuario seleccionado
$selectedUser = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
$selectedLastName = htmlspecialchars($_GET['last_name'], ENT_QUOTES, 'UTF-8');

// Consulta a la base de datos para obtener los detalles del usuario
$sqlDetails = "SELECT * FROM usuarios WHERE name = ? AND last_name = ?";
$stmt = $conn->prepare($sqlDetails);
$stmt->bind_param('ss', $selectedUser, $selectedLastName);
$stmt->execute();
$resultDetails = $stmt->get_result();

// Mostrar la tabla con los detalles del usuario
if ($resultDetails->num_rows > 0) {
    $row = $resultDetails->fetch_assoc();

    echo "<table class='border-collapse border border-slate-500'>";
    echo "<tr><th class='border border-slate-600 p-4'>Profile Picture</th><th class='border border-slate-600 p-4'>Name</th><th class='border border-slate-600 p-4'>Last Name</th><th class='border border-slate-600 p-4'>Home</th><th class='border border-slate-600 p-4'>Phone</th><th class='border border-slate-600 p-4'>CURP</th><th class='border border-slate-600 p-4'>Age</th><th class='border border-slate-600 p-4'>Academic Grade</th><th class='border border-slate-600 p-4'>Acción</th></tr>";
    echo "<tr>";
    echo "<td class='border border-slate-600 p-4' id='picture'><img src='" . htmlspecialchars($row['profile_picture'], ENT_QUOTES, 'UTF-8') . "' alt='Profile Picture' style='width:50px;height:50px;'></td>";
    echo "<td class='border border-slate-600 p-4' id='user-name'>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td class='border border-slate-600 p-4' id='user-last-name'>" . htmlspecialchars($row['last_name'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td class='border border-slate-600 p-4'>" . htmlspecialchars($row['home'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td class='border border-slate-600 p-4'>" . htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td class='border border-slate-600 p-4'>" . htmlspecialchars($row['curp'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td class='border border-slate-600 p-4'>" . htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td class='border border-slate-600 p-4'>" . htmlspecialchars($row['academic_grade'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td class='border border-slate-600 p-4 font-bold text-red-500 delete-user cursor-pointer'>" . 'Borrar' . "</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "No se encontraron detalles para este usuario.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

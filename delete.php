<html>
<head>
</head>
<body>
<?php
// Conexión a MySQL
$servername = "localhost";
$username   = "jonathanezz";      // tu usuario de MySQL
$password   = "j130429k";          // tu contraseña de MySQL
$dbname     = "my_domain"; // tu base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el mail desde la URL
$mail = $_GET['mail'];

// Preparar query DELETE
$sql = "DELETE FROM persons WHERE mail = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mail);

if ($stmt->execute()) {
    echo "✅ Registro con mail " . htmlspecialchars($mail) . " eliminado correctamente.";
} else {
    echo "❌ Error al eliminar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
</body>
</html>

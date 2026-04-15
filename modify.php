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

// Recibir datos del formulario
$id   = $_POST['id'];
$cn   = $_POST['cn'];
$sn   = $_POST['sn'];
$mail = $_POST['mail'];
$tel  = $_POST['telephoneNumber'];

// Preparar query UPDATE
$sql = "UPDATE persons 
        SET cn = ?, sn = ?, mail = ?, telephoneNumber = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $cn, $sn, $mail, $tel, $id);

if ($stmt->execute()) {
    echo "✅ Registro actualizado correctamente.";
} else {
    echo "❌ Error al actualizar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
</body>
</html>

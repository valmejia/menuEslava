<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Personas</title>
</head>
<body>
<?php
// Conexión a MySQL
$servername = "localhost";
$username   = "jonathanezz";      // tu usuario de MySQL
$password   = "j130429k";         // tu contraseña de MySQL
$dbname     = "my_domain";        // tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// 🚀 Si viene del formulario (POST), insertar nuevo registro
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cn   = $_POST['cn'];
    $sn   = $_POST['sn'];
    $mail = $_POST['mail'];

    if (!empty($cn) && !empty($sn) && !empty($mail)) {
        $sql = "INSERT INTO persons (cn, sn, mail) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $cn, $sn, $mail);
        $stmt->execute();
        $stmt->close();
    }
}
?>
<table width="600" cellpadding="5" cellspacing="5" border="1">
<tr>
    <td><b>First Name</b></td>
    <td><b>Last Name</b></td>
    <td><b>Email</b></td>
    <td colspan="2"><b>Acciones</b></td>
</tr>
<?php
// Consulta a la tabla persons
$sql = "SELECT cn, sn, mail FROM persons";
$result = $conn->query($sql);

// Mostrar resultados en tabla
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["cn"]."</td>";
        echo "<td>".$row["sn"]."</td>";
        echo "<td>".$row["mail"]."</td>";
        echo "<td><a href='edit.php?mail=" . urlencode($row["mail"]) . "'>Edit</a></td>";
        echo "<td><a href='delete.php?mail=" . urlencode($row["mail"]) . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron registros.</td></tr>";
}

// Cerrar conexión
$conn->close();
?>
</table>
<p>
<a href="add.html">Add new entry</a>
</body>
</html>

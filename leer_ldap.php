<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Personas</title>
</head>
<body>
<?php
// Datos de conexión a MySQL
$servername = "localhost";
$username   = "jonathanezz";      // tu usuario de MySQL
$password   = "j130429k";          // tu contraseña de MySQL
$dbname     = "my_domain"; // tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta a la tabla persons
$sql = "SELECT id, cn, sn, mail, telephoneNumber, objectClass FROM persons";
$result = $conn->query($sql);

// Mostrar resultados
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "CN: " . $row["cn"] . "<br>";
        echo "SN: " . $row["sn"] . "<br>";
        echo "Email: " . $row["mail"] . "<br>";
        echo "Teléfono: " . ($row["telephoneNumber"] ?? "Sin número") . "<br>";
        echo "Objeto: " . $row["objectClass"] . "<p>";
    }
    echo "Número de entradas encontradas: " . $result->num_rows . "<p>";
} else {
    echo "No se encontraron registros.";
}

// Cerrar conexión
$conn->close();
?>
</body>
</html>

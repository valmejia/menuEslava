<html>
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda</title>
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

// Verificar que se envió el formulario
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);

    if ($name == "") {
        echo "⚠️ Debes escribir un nombre para buscar.";
    } else {
        // Escapar entrada para evitar inyección SQL
        $name = $conn->real_escape_string($name);

        // Buscar coincidencias en la columna cn
        $sql = "SELECT cn, mail, sn, telephoneNumber 
                FROM persons 
                WHERE cn LIKE '%$name%'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<h3>Resultados encontrados:</h3>";
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li><b>CN:</b> " . $row["cn"] . 
                     " | <b>Apellido:</b> " . $row["sn"] . 
                     " | <b>Email:</b> " . $row["mail"] . 
                     " | <b>Teléfono:</b> " . ($row["telephoneNumber"] ?? "N/A") . 
                     "</li>";
            }
            echo "</ul>";
            echo "Número de entradas encontradas: " . $result->num_rows;
        } else {
            echo "❌ No se encontraron resultados para: <b>" . htmlspecialchars($name) . "</b>";
        }
    }
}

$conn->close();
?>
</body>
</html>

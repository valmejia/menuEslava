<html>
<head>
    <meta charset="UTF-8">
    <title>Búsqueda Avanzada</title>
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

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cn    = trim($_POST['cn']);
    $sn    = trim($_POST['sn']);
    $email = trim($_POST['email']);

    // Armamos condiciones dinámicas según lo que el usuario llene
    $conditions = [];
    if ($cn != "")    $conditions[] = "cn LIKE '%" . $conn->real_escape_string($cn) . "%'";
    if ($sn != "")    $conditions[] = "sn LIKE '%" . $conn->real_escape_string($sn) . "%'";
    if ($email != "") $conditions[] = "mail LIKE '%" . $conn->real_escape_string($email) . "%'";

    if (count($conditions) > 0) {
        $sql = "SELECT cn, sn, mail, telephoneNumber FROM persons WHERE " . implode(" AND ", $conditions);
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<h3>Resultados encontrados:</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li><b>" . $row["sn"] . "</b> - " 
                    . $row["mail"] . " - Tel: " 
                    . ($row["telephoneNumber"] ?? "N/A") . "</li>";
            }
            echo "</ul>";
            echo "Número de entradas encontradas: " . $result->num_rows . "<p>";
        } else {
            echo "❌ No se encontraron resultados.";
        }
    } else {
        echo "⚠️ Debes ingresar al menos un criterio de búsqueda.";
    }
}

$conn->close();
?>
</body>
</html>

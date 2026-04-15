<html>
<head>
</head>
<body>
<table width="450" cellpadding="5" cellspacing="5" border="1">
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

// Tomar el mail desde la URL
$mail = urldecode($_GET['mail']);

// Buscar en la tabla persons por mail
$sql = "SELECT * FROM persons WHERE mail = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $info = $result->fetch_assoc();
} else {
    die("No se encontró ningún registro con ese mail.");
}
?>
<form method="POST" action="modify.php">
<table border="0" cellpadding="0" cellspacing="10" width="500" >
<tr>
<td width="50%" align="right">First Name</td>
<td width="50%"><input type="text" name="cn" size="20" value="<?php echo $info['cn']; ?>"></td>
</tr>
<tr>
<td width="50%" align="right">Last Name</td>
<td width="50%"><input type="text" name="sn" size="20" value="<?php echo $info['sn']; ?>"></td>
</tr>
<tr>
<td width="50%" align="right">E-mail</td>
<td width="50%"><input type="text" name="mail" size="20" value="<?php echo $info['mail']; ?>"></td>
</tr>
<tr>
<td width="50%" align="right">Telephone</td>
<td width="50%"><input type="text" name="telephoneNumber" size="20" value="<?php echo $info['telephoneNumber']; ?>"></td>
</tr>
<tr>
<td width="100%" colspan="2" align="center">
<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
<input type="submit" value="Submit" name="Submit">
&nbsp;&nbsp;<input type="reset" value="Reset" name="Reset">
</td>
</tr>
</table>
</form>
<?php
$conn->close();
?>
</table>
</body>
</html>

<!-- Manual de PHP -->
<html>
<head>
<title>Ejemplo de PHP</title>
</head>
<body>
<H1>Ejemplo de uso de bases de datos con PHP y MySQL</H1>

<?php
include("Conexion_BD.php");
$link = Conectarse();

// Verificar si se envió el formulario
if (isset($_GET['accion']) && $_GET['accion'] == 'Grabar') {
    $nombre = $_GET['nombre'];
    $apellidos = $_GET['apellidos'];

    // Insertar datos en la BD
    if (!empty($nombre) && !empty($apellidos)) {
        $sql = "INSERT INTO prueba (Nombre, Apellidos) VALUES ('$nombre', '$apellidos')";
        mysqli_query($link, $sql) or die("Error al insertar: " . mysqli_error($link));
        echo "<p style='color:green;'>Registro guardado correctamente ✅</p>";
    } else {
        echo "<p style='color:red;'>Por favor llena todos los campos ❌</p>";
    }
}
?>

<!-- Formulario -->
<FORM ACTION="" method="get">
<TABLE>
<TR>
<TD>Nombre:</TD>
<TD><INPUT TYPE="text" NAME="nombre" SIZE="20" MAXLENGTH="30"></TD>
</TR>
<TR>
<TD>Apellidos:</TD>
<TD><INPUT TYPE="text" NAME="apellidos" SIZE="20" MAXLENGTH="30"></TD>
</TR>
</TABLE>
<INPUT TYPE="submit" NAME="accion" VALUE="Grabar">
</FORM>

<hr>

<?php
// Mostrar los registros
$result = mysqli_query($link, "SELECT * FROM prueba");
?>
<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1>
<TR><TD>&nbsp;Nombre</TD><TD>&nbsp;Apellidos&nbsp;</TD></TR>
<?php
while ($row = mysqli_fetch_array($result)) {
    printf("<tr><td>&nbsp;%s</td><td>&nbsp;%s&nbsp;</td></tr>",
        $row["Nombre"], $row["Apellidos"]);
}

mysqli_free_result($result);
mysqli_close($link);
?>
</table>
</body>
</html>

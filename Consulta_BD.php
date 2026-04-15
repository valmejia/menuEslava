<!-- Manual de PHP -->
<html>
<head>
<title>Ejemplo de PHP</title>
</head>
<body>
<H1>Ejemplo de uso de bases de datos con PHP y MySQLi</H1>
<?php
include("Conexion_BD.php");
$link = Conectarse();

// Ejecutar consulta
$result = mysqli_query($link, "SELECT * FROM prueba");
?>
<TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1>
<TR><TD>&nbsp;Nombre</TD><TD>&nbsp;Apellidos&nbsp;</TD></TR>
<?php
// Recorrer resultados
while ($row = mysqli_fetch_array($result)) {
    printf("<tr><td>&nbsp;%s</td><td>&nbsp;%s&nbsp;</td></tr>",
        $row["Nombre"], $row["Apellidos"]);
}

// Liberar resultados y cerrar conexión
mysqli_free_result($result);
mysqli_close($link);
?>
</table>
</body>
</html>

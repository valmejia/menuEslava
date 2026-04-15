<!-- Manual de PHP -->
<html>
<head>
<title>Ejemplo de PHP</title>
</head>
<body>
<?php
function Conectarse()
{
    // Conectar
    if (!($link = mysqli_connect("localhost", "jonathanezz", "j130429k"))) {
        echo "Error conectando a la base de datos.";
        exit();
    }

    // Seleccionar la BD
    if (!mysqli_select_db($link, "1")) {
        echo "Error seleccionando la base de datos.";
        exit();
    }

    return $link;
}

$link = Conectarse();
echo "Conexión con la base de datos conseguida.<br>";

mysqli_close($link); // cierra la conexión
?>
</body>
</html>

<html>
<head>
<title>Ejemplo de PHP</title>
</head>
<body>
    <h1>Ejemplo de procesado de formularios</h1>

    <?php
    if (isset($_GET['nombre']) && $_GET['nombre'] != "") {
        echo "El nombre que ha introducido es: " . htmlspecialchars($_GET['nombre']);
    } else {
        echo "No introdujo ningún nombre.";
    }
    ?>
</body>
</html>

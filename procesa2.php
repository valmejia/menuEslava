<html>
<head>
<title>Ejemplo de PHP</title>
</head>
<body>
    <h1>Ejemplo de procesado de formularios</h1>
    <?php
    if (!empty($_POST['nombre']) && !empty($_POST['apellidos'])) {
        echo "El nombre que ha introducido es: " 
             . htmlspecialchars($_POST['nombre']) . " " 
             . htmlspecialchars($_POST['apellidos']);
    } else {
        echo "No introdujo todos los datos.";
    }
    ?>
</body>
</html>

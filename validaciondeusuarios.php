<?php
// Manual de PHP

// Si no se ha enviado usuario/clave, pedimos autenticación
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Acceso restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorization Required.';
    exit;
}

// Leer archivo de contraseñas
$fich = file("passwords.txt");
$i = 0;
$validado = false;

// Verificar si el usuario y la contraseña existen en el archivo
while (isset($fich[$i]) && !$validado) {
    $campo = explode(":", $fich[$i]);
    if (($_SERVER['PHP_AUTH_USER'] == trim($campo[0])) && ($_SERVER['PHP_AUTH_PW'] == trim($campo[1]))) {
        $validado = true;
    }
    $i++;
}

// Si no se validó, pedimos autenticación nuevamente
if (!$validado) {
    header('WWW-Authenticate: Basic realm="Acceso restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorization Required.';
    exit;
}
?>
<!-- Manual de PHP -->
<html>
<head>
    <title>Ejemplo de PHP</title>
</head>
<body>
    Ha conseguido el acceso a la <b>zona restringida</b> con el usuario
    <?php echo htmlspecialchars($_SERVER['PHP_AUTH_USER']); ?>.
</body>
</html>

<?php
// Manual de PHP
if (($_SERVER['PHP_AUTH_USER'] != "Gtos") || ($_SERVER['PHP_AUTH_PW'] != "123")) {
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
    Ha conseguido el acceso a la <b>zona restringida</b>.
</body>
</html>

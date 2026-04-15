<?php
// Manual de PHP
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Acceso restringido"'); // usado la primera vez
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorization Required.'; // en caso que usuario aprete CANCELAR
    exit;
} else {
    echo "Ha introducido el nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br>";
    echo "Ha introducido la contraseña: " . $_SERVER['PHP_AUTH_PW'] . "<br>";
}
?>

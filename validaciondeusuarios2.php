<?php
$auth = false; // Usuario no autenticado

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $user_input = $_SERVER['PHP_AUTH_USER'];
    $pass_input = $_SERVER['PHP_AUTH_PW'];

    // Archivo de usuarios y contraseñas
    $filename = 'htpasswd.txt';
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        list($user, $pass) = explode(':', trim($line));
        if ($user_input === trim($user) && $pass_input === trim($pass)) {
            $auth = true;
            break;
        }
    }
}

// Si no está autenticado, pedir usuario/contraseña
if (!$auth) {
    header('WWW-Authenticate: Basic realm="Private"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorization Required.';
    exit;
} else {
    echo '<p>Ud. está autenticado!</p>';
    echo '<p>Usuario: ' . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . '</p>';
}
?>

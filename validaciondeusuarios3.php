<?php
$auth = false; // Usuario no autenticado

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $user_input = $_SERVER['PHP_AUTH_USER'];
    $pass_input = $_SERVER['PHP_AUTH_PW'];

    // Conectar a la base de datos usando mysqli
    $mysqli = new mysqli('localhost', 'jonathanezz', 'j130429k', 'curso_php');

    if ($mysqli->connect_errno) {
        die("Error al conectar a la base de datos: " . $mysqli->connect_error);
    }

    // Preparar la consulta para evitar SQL Injection
    $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user_input);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($password_hash);
        $stmt->fetch();

        // Verificar contraseña
        if ($pass_input === $password_hash) { // O password_verify($pass_input, $password_hash) si usas hash
            $auth = true;
        }
    }

    $stmt->close();
    $mysqli->close();
}

// Si no está autenticado, pedir usuario/contraseña
if (!$auth) {
    header('WWW-Authenticate: Basic realm="Private"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorization Required.';
    exit;
} else {
    echo '<p>Ud. está autenticado!</p>';
}
?>

<?php
// Crear cookie (dura 1 hora)
setcookie("edad", 20, time() + 3600);

// Mostrar edad si existe
if (isset($_COOKIE['edad'])) {
    echo "Su edad: " . $_COOKIE['edad'] . "<br>";
} else {
    echo "Cookie 'edad' no definida<br>";
}

// Mostrar navegador
echo "Navegador: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";

// Mostrar variable GET si existe
if (isset($_GET['var'])) {
    echo "Variable: " . $_GET['var'] . "<br>";
} else {
    echo "Variable GET 'var' no definida<br>";
}
?>

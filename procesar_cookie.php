<?php
declare(strict_types=1);

$nombre = trim($_GET['nombre'] ?? '');

// Establecemos cookie válida por 1 hora en todo el dominio
if ($nombre !== '') {
    setcookie("ejemusuario", $nombre, time() + 3600, "/");
}
?>
<html>
<head>
    <title>Ejemplo de uso de cookie</title>
</head>
<body>
    <h1>Ejemplo de uso de cookie</h1>
    <?php if ($nombre !== ''): ?>
        Se ha establecido una cookie de nombre <b>ejemusuario</b> con el valor:
        <b><?= htmlspecialchars($nombre) ?></b> que será válida durante 1 hora.
    <?php else: ?>
        No se ha recibido ningún nombre.
    <?php endif; ?>
</body>
</html>

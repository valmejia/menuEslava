<?php
declare(strict_types=1);

$valor = $_COOKIE['ejemusuario'] ?? null;
?>
<html>
<head>
    <title>Ejemplo de uso de cookie</title>
</head>
<body>
    <h1>Ejemplo de uso de cookie</h1>
    <?php if ($valor): ?>
        La cookie de nombre <b>ejemusuario</b> vale: <b><?= htmlspecialchars($valor) ?></b>
    <?php else: ?>
        No existe la cookie <b>ejemusuario</b> o ha expirado.
    <?php endif; ?>
</body>
</html>

<?php
declare(strict_types=1);

session_start();

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

$_SESSION['contador']++;

echo '<a href="' . htmlspecialchars($_SERVER['PHP_SELF']) . '">Contador vale: ' . $_SESSION['contador'] . '</a><br>';
echo 'ID de la sesión: ' . session_id();

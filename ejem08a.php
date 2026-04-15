<?php
declare(strict_types=1);

session_start();
echo "He inicializado la sesión<br>";
echo "La sesión actual es: " . session_id();

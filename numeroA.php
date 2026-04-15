<?php
session_start();


if (!isset($_SESSION['numero_secreto'])) {
    $_SESSION['numero_secreto'] = rand(1, 50); 
    $_SESSION['vidas'] = 5; // intentos máximos
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST['numero']);
    $_SESSION['vidas']--;

    if ($numero == $_SESSION['numero_secreto']) {
        $mensaje = "🎉 ¡Ganaste! El número era <b>" . $_SESSION['numero_secreto'] . "</b>. 
                   Lo lograste con " . (5 - $_SESSION['vidas']) . " intentos.";
        session_destroy(); // reinicia juego
    } elseif ($_SESSION['vidas'] <= 0) {
        $mensaje = "¡Perdiste! Ya no tienes intentos. 
                   El número era <b>" . $_SESSION['numero_secreto'] . "</b>.";
        session_destroy();
    } elseif ($numero < $_SESSION['numero_secreto']) {
        $mensaje = "🔼 El número secreto es <b>MÁS ALTO</b> que $numero. 
                   Te quedan " . $_SESSION['vidas'] . " intentos.";
    } else {
        $mensaje = "🔽 El número secreto es <b>MÁS BAJO</b> que $numero. 
                   Te quedan " . $_SESSION['vidas'] . " intentos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
 
</head>
<body style="font-family: Arial; text-align: center; margin-top: 50px;">
    <h2>Adivina el número (1 al 50)</h2>
    <p>Tienes <b>5 intentos</b> para adivinar el número secreto.</p>

    <?php if (!isset($_SESSION['numero_secreto'])): ?>
        <!-- Si el juego terminó -->
        <form method="post">
            <button type="submit">🔄 Jugar de nuevo</button>
        </form>
    <?php else: ?>
        <!-- Si el juego sigue -->
        <form method="POST">
            <input type="number" name="numero" min="1" max="50" required>
            <button type="submit">Probar suerte</button>
        </form>
    <?php endif; ?>

    <h3 style="color: darkblue;"><?php echo $mensaje; ?></h3>
</body>
</html>
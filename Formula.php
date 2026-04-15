<?php

$resultado1 = null;
$resultado2 = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $a = floatval($_POST["a"]);
    $b = floatval($_POST["b"]);
    $c = floatval($_POST["c"]);

   
    // x1 = (a)^2 + (b)^2 + (c)^2
    $resultado1 = pow($a, 2) + pow($b, 2) + pow($c, 2);

    // x2 = (a) * sqrt( ( (a*b)^2 + (b*c) ) / (a^2) )
    $numerador = (pow($a, 2) + ($b * $c));
    $denominador = pow($a, 2);
    $resultado2 = $a * (sqrt($numerador) / pow($a, 2));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
 
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        
        input {
            width: 100%;
            padding: 6px;
            margin: 6px 0;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #0077cc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #005fa3;
        }
        .resultado {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>



    <form method="post" action="">
        <label>Ingrese el valor de a:</label>
        <input type="number" step="any" name="a" required>

        <label>Ingrese el valor de b:</label>
        <input type="number" step="any" name="b" required>

        <label>Ingrese el valorde c:</label>
        <input type="number" step="any" name="c" required>

        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado1 !== null): ?>
        <div class="resultado">
            <p><strong>x1:</strong> <?= $resultado1 ?></p>
            <p><strong>x2:</strong> <?= $resultado2 ?></p>
        </div>
    <?php endif; ?>

</body>
</html>
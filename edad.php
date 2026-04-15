<?php
$mensaje = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edad = intval($_POST["edad"]);

    if ($edad >= 1 && $edad <= 9) {
        $mensaje = "Inocente";
    } elseif ($edad >= 10 && $edad <= 19) {
        $mensaje = "Mortal";
    } elseif ($edad >= 20 && $edad <= 39) {
        $mensaje = "Sobrevive";
    } elseif ($edad >= 40 && $edad <= 60) {
        $mensaje = "En peligro";
    } else {
        $mensaje = "Edad fuera de rango";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clasificación por Edad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            text-align: center;
            width: 350px;
        }

        h2 {
            color: #333;
        }

        label {
            font-size: 16px;
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #45a049;
        }

        .resultado {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #444;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Clasifica tu edad</h2>

        <form method="post">
            <label for="edad">Ingresa tu edad:</label>
            <input type="number" name="edad" id="edad" min="1" required>
            <button type="submit">Enviar</button>
        </form>

        <?php if ($mensaje): ?>
            <div class="resultado">Resultado: <?php echo $mensaje; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>

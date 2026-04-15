<?php
$filas = 4;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $filas = intval($_POST['filas']);
    if ($filas < 1) $filas = 1;
    if ($filas > 100) $filas = 100;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <style>
        body {
            font-family: Arial, sans-serif;
         
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #222;
            text-shadow: 1px 1px 2px white;
        }
        form {
            margin-bottom: 20px;
        }
        input, button {
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #444;
            font-size: 14px;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #388E3C;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 60%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background: #333;
            color: white;
        }
        tr:nth-child(odd) {
            background: #FFCDD2; /* rojo claro */
        }
        tr:nth-child(even) {
            background: #FFF9C4; /* amarillo claro */
        }
        
    </style>
</head>
<body>
  
    <form method="post">
        <label>Cantidad de filas (1–100): </label>
        <input type="number" name="filas" value="<?= $filas ?>" min="1" max="100">
        <button type="submit">Generar</button>
    </form>

    <table>
        <tr><th>#</th><th>Nombre</th></tr>
        <?php
        for ($i = 1; $i <= $filas; $i++) {
            echo "<tr><td>$i</td><td>Nombre $i</td></tr>";
        }
        ?>
    </table>
</body>
</html>
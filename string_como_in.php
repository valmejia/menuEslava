<?php
// Definir el arreglo asociativo
$comida = array();
$comida["Mallorca"] = "Sopas";
$comida["Valencia"] = "Paella";
$comida["Madrid"]   = "Cocido";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comidas típicas</title>
</head>
<body>
    <h2>Comidas típicas por ciudad</h2>
    <table border="1">
        <tr>
            <th>Ciudad</th>
            <th>Comida</th>
        </tr>
        <?php
        foreach ($comida as $ciudad => $plato) {
            echo "<tr>";
            echo "<td>$ciudad</td>";
            echo "<td>$plato</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

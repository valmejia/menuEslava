<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de PHP</title>
</head>
<body>
<?php
echo strlen("12345"), "<br>";

$palabras = explode(" ", "Esto es una prueba");
for ($i = 0; $i < count($palabras); $i++) {
    echo $palabras[$i], "<br>";
}

$resultado = sprintf("8x5 = %d <br>", 8*5);
echo $resultado, "<br>";

echo substr("Devuelve una subcadena de otra", 9, 3), "<br><br>";

if (chop("Cadena \n\n ") == "Cadena")
    echo "Iguales<br><br>";

echo strpos("Busca la palabra dentro de la frase", "palabra"), "<br><br>";

echo str_replace("verde", "rojo", "Un pez de color verde, como verde es la hierba."), "<br>";
?>
</body>
</html>

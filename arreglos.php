<?php
$mi_array = []; // inicializo el array vacío

print "Mi_array completo: ";
print_r($mi_array);
print "<br>";

print "Mi_array[5] es: " . (isset($mi_array[5]) ? $mi_array[5] : "No definido") . "<br>";

$mi_array[5] = "Posición 6ta";

print "Mi_array[5] es: " . $mi_array[5] . "<br>";

print "Mi_array completo ahora: ";
print_r($mi_array);
print "<br>";
?>

<?php
include("Conexion_BD.php");
$link = Conectarse();

// Verificar si se recibió el ID por GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Seguridad básica para que sea número
    
    // Ejecutar borrado
    mysqli_query($link, "DELETE FROM prueba WHERE ID_Prueba = $id");
}

// Redirigir de regreso al listado
header("Location: Borrado_BD.php");
exit;

mysqli_close($link);
?>

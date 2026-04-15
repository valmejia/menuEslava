<?php
if (isset($_GET['direccion']) && $_GET['direccion'] != "") {
    $direccion = $_GET['direccion'];
    $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'plano';

    if ($tipo == "plano") {
        // Envio en formato texto plano
        mail($direccion, "Ejemplo de envio de email",
            "Ejemplo de envio de email de texto plano\n\nPHP.\nhttp://www.php.net/\nManuales para desarrolladores web.",
            "From: Pruebas <webmaster@hotmail.com>\r\n");
    } else {
        // Envio en formato HTML
        $mensaje = "<html><head><title>PHP. Manual de PHP</title></head><body>
        Ejemplo de envio de email de HTML<br><br>
        PHP.<br>
        http://www.php.net/<br>
        <u>Manuales</u> para <b>desarrolladores</b> web.
        </body></html>";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: Pruebas <webmaster@hotmail.com>\r\n";

        mail($direccion, "Ejemplo de envio de email", $mensaje, $headers);
    }

    echo "Se ha enviado un email a la direccion: $direccion en formato <b>$tipo</b>.";
}
?>

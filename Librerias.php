<!-- Manual de PHP --> 
<html> 
<head> 
<title>Ejemplo de PHP</title> 
</head> 
<body> 
<?php include("libreria01.phtml") ?> 
<?php CabeceraPagina(); ?> 
 
Esta es otra página<BR><BR> 
completamente distinta<BR><BR> 
pero comparte el pie y la cabecera con la otra.<BR><BR> 
 
<?php PiePagina(); ?> 
</body> 
</html> 
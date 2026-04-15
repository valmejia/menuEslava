<!-- Manual de PHP -->
<html>
<head>
<title>Ejemplo de PHP</title>
</head>
<body>
<?php
$var="texto";
$num=3;
printf("Puede fácilmente intercalar <b>%s</b> con números <b>%d</b>
<br>",$var,$num);
printf("<TABLE BORDER=1 CELLPADDING=20>");
for ($i=0;$i<5;$i++)
{
printf("<tr><td>%10.d</td></tr>",$i);
}
printf("</table>");
?>
</body>
</html>
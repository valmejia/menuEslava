<?php
// Archivo: calendario.php

$_PHP_LINK = $_SERVER['PHP_SELF'];

// Nombres de meses y días
$meses = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
               "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$WeekDays = array("Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa");

$fontb = "<font color=#FFFFFF>";
$fonte = "</font>";

// Determinar día base
if (!isset($_GET['Day'])) {
    $Day = time();
} else {
    $Day = $_GET['Day'];
}

$month = date("n", $Day);
$year  = date("Y", $Day);

// Calcular mes anterior y siguiente
$NextMonth     = mktime(0,0,0, $month+1, 1, $year);
$PreviousMonth = mktime(0,0,0, $month-1, 1, $year);

// Calcular año anterior y siguiente
$NextYear     = mktime(0,0,0, $month, 1, $year+1);
$PreviousYear = mktime(0,0,0, $month, 1, $year-1);

// Día de inicio del mes
$starter = date("w", mktime(0, 0, 0, $month,1, $year));
// Total de días en el mes
$totaldays = date("t", mktime(0, 0, 0, $month,1, $year));
?>

<html>
<head>
<title>Pequeño Calendario</title>
<style type="text/css">
a:hover { color: #FF0000; text-decoration: none}
a:link { text-decoration: none}
a:visited { text-decoration: none}
.small_letter { font-size: xx-small; color: #FFFFFF}
</style>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="3" bgcolor="#3366CC">
<tr bgcolor="#3366CC">
    <td colspan="7" align="center" class="small_letter">
        <a href="<?=$_PHP_LINK?>?Day=<?=$PreviousMonth?>"><?=$fontb."<<".$fonte?></a>
        &nbsp;<?=$meses[$month]?>&nbsp;
        <a href="<?=$_PHP_LINK?>?Day=<?=$NextMonth?>"><?=$fontb.">>".$fonte?></a>
    </td>
</tr>
<tr bgcolor="#3366CC" class="small_letter">
    <?php
    for ($i=0; $i<7; $i++) {
        echo "<td align='center'>".$WeekDays[$i]."</td>";
    }
    ?>
</tr>
<tr bgcolor="#FFFFFF">
<?php
// Espacios en blanco antes del primer día
for ($i=0; $i<$starter; $i++) {
    echo "<td>&nbsp;</td>";
}

$weekday = $starter;
for ($d=1; $d <= $totaldays; $d++) {
    echo "<td align='center'><font color='#0000FF'>$d</font></td>";
    $weekday++;
    if ($weekday == 7) {
        echo "</tr><tr bgcolor='#FFFFFF'>";
        $weekday = 0;
    }
}

// Rellenar los huecos al final
if ($weekday != 0) {
    for ($i=$weekday; $i<7; $i++) {
        echo "<td>&nbsp;</td>";
    }
}
?>
</tr>
<tr bgcolor="#3366CC">
    <td colspan="7" align="center" class="small_letter">
        <a href="<?=$_PHP_LINK?>?Day=<?=$PreviousYear?>"><?=$fontb."<<".$fonte?></a>
        &nbsp;<?=$year?>&nbsp;
        <a href="<?=$_PHP_LINK?>?Day=<?=$NextYear?>"><?=$fontb.">>".$fonte?></a>
    </td>
</tr>
</table>
</body>
</html>
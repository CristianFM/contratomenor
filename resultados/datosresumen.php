<?php

require("res/id_mysql.php");

$fecha = date("Y/m/d");
$s='';
$mysqli = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);
/* comprobar la conexión */

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
$s='';

$tildes = $mysqli->query("SET NAMES 'utf8'");
$ssql="SELECT instrumento, COUNT(instrumento) FROM audiciones GROUP BY instrumento";
$result = mysqli_query($mysqli, $ssql);
$s.='<table class="table table-striped table-bordered">';
$s.='<thead>';
$s.='<tr>';
$s.='<th>Instrumento</th>';
$s.='<th>Inscritos</th>';
$s.='<th>Inscritos Aceptados</th>';
$s.='</tr>';
$s.='</thead>';
$s.= '<tbody>';
while( $row = mysqli_fetch_assoc($result) ) { 
	 $s.='<tr>';
	 $s.='<td>'.$row["instrumento"].'</td>';
     $s.='<td>'.$row["COUNT(instrumento)"].'</td>';
     $ssql="SELECT COUNT('id') FROM audiciones WHERE falta='OK' AND instrumento ='" .$row["instrumento"]."'";
     $result2 = mysqli_query($mysqli, $ssql);
     $row2 = mysqli_fetch_assoc($result2);
     $s.='<td>'.$row2["COUNT('id')"].'</td>';
     $s.='</tr>';	 
} 

$s.='</tbody>';
$s.='<table class="table table-striped table-bordered">';
$s.='<thead>';
$s.='<tr>';
$s.='<th>FLAG</th>';
$s.='<th>resultado</th>';
$s.='</tr>';
$s.='</thead>';
$s.= '<tbody>';
$ssql="SELECT COUNT( id ) FROM audiciones WHERE falta IS NULL";
$result = mysqli_query($mysqli, $ssql);
$nulos = mysqli_fetch_assoc($result);
// ---- inscritos ------
$ssql="SELECT DISTINCT dni FROM audiciones";
$result = mysqli_query($mysqli, $ssql);
//$nauditores = mysqli_fetch_assoc($result);
$auditores=mysqli_num_rows($result);
$s.='<tr>';
$s.='<td> Nº de personas inscritas';
$s.='<td>'.$auditores.'</td>';
$s.='</tr>';
// ---------------------

$ssql="SELECT falta, COUNT(falta) FROM audiciones GROUP BY falta";
$result = mysqli_query($mysqli, $ssql);

while( $row = mysqli_fetch_assoc($result) ) { 
     $s.='<tr>';
     if ($row["falta"] == NULL) 
        { 
            $s.='<td> Inscripciones sin analizar';
            $s.='<td>'.$nulos['COUNT( id )'].'</td>';
        } else {
            $s.='<td>'.$row["falta"].'</td>';
            $s.='<td>'.$row["COUNT(falta)"].'</td>';
        }
     $s.='</tr>';    
} 
$s.='</tbody>';



echo $s;
?>
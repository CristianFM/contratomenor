<?php
require("res/id_mysql.php");

$ronda1=$_GET['ronda1'];
$ronda2=$_GET['ronda2'];

//$limit=5; 


$fecha = date("Y/m/d");
$mysqli = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}


$tildes = $mysqli->query("SET NAMES 'utf8'");
//$ssql="SELECT DISTINCT ronda1 FROM audiciones";

if (isset($_GET['ronda1'])) $rondas = 'ronda1';
if (isset($_GET['ronda2'])) $rondas = 'ronda2';

$ssql="SELECT ". $rondas ." ,COUNT(".$rondas.") FROM audiciones GROUP BY ".$rondas."";
$result = mysqli_query($mysqli, $ssql);

while( $row = mysqli_fetch_assoc($result) ) { 
    if ($rondas=='ronda1') $data[] = array ('obra1' => $row["ronda1"] , 'cantidad1'=> $row["COUNT(ronda1)"]);
    else $data[] = array ('obra2' => $row["ronda2"] , 'cantidad2'=> $row["COUNT(ronda2)"]);
} 

//print_r($limit);
echo json_encode($data);  // se
?>
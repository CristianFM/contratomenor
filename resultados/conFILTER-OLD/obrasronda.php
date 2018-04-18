<?php
require("res/id_mysql.php");

$rondas=$_GET['ronda'];

//$limit=5; 


$fecha = date("Y/m/d");
$mysqli = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}


$tildes = $mysqli->query("SET NAMES 'utf8'");
//$ssql="SELECT DISTINCT ronda1 FROM audiciones";
$ssql="SELECT ". $rondas ." ,COUNT(".$rondas.") FROM audiciones GROUP BY ".$rondas."";
$result = mysqli_query($mysqli, $ssql);

while( $row = mysqli_fetch_assoc($result) ) { 

    if ( $rondas == 'ronda1' ) $data[] = array ('obra' => $row["ronda1"] , 'cantidad'=> $row["COUNT(ronda1)"]);
    else $data[] = array ('obra' => $row["ronda2"] , 'cantidad'=> $row["COUNT(ronda2)"]);
    //$totalRecords++;
}  

//print_r($limit);
echo json_encode($data);  // se
?>
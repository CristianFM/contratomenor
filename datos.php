<?php
require("../res/id_mysql.php");
$where=$_POST['searchPhrase'];
$sort=$_POST['sort'];
$campo=key($_POST['sort']);


$fecha     = date("Y/m/d");
$i=0;

$mysqli = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);
/* comprobar la conexión */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
$tildes = $mysqli->query("SET NAMES 'utf8'");
$ssql="SELECT * FROM audiciones WHERE $campo LIKE '%"."$where"."%' ORDER BY $campo $sort[$campo]";
$result = mysqli_query($mysqli, $ssql);

  
//iterate on results row and create new index array of data
while( $row = mysqli_fetch_assoc($result) ) { 
    $data[] = $row;
}   

$json_data = array(
        "current"   => intval( $params['current'] ), 
        "rowCount"  => 10,            
        "total"     => intval( $totalRecords ),
        "rows"      => $data   // total data array
        );
//
echo json_encode($json_data);  // send data as json format

//print ($ssql)
?>
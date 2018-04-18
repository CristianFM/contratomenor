<?php
require("../res/id_mysql.php");
//$where=$_POST['searchPhrase'];
//$sort=$_POST['sort'];
//$params=$_POST['current'];
//$rowCount=$_POST['rowCount'];
//$campo=key($_POST['sort']);


$fecha     = date("Y/m/d");
$mysqli = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);
/* comprobar la conexión */

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

/*
$sql = "SELECT * FROM audiciones WHERE $campo LIKE '%"."$where"."%'";  // sentencia sql

$result = mysqli_query($mysqli,$sql);
$totalRecords = mysqli_num_rows($result);
//mysql_free_result('$result');

//print($sql);

$tildes = $mysqli->query("SET NAMES 'utf8'");

*/
//$ssql="SELECT * FROM audiciones WHERE $campo LIKE '%"."$where"."%' ORDER BY $campo $sort[$campo] LIMIT ".(($params-1)*10).','.$rowCount;
//$result = mysqli_query($mysqli, $ssql);
$tildes = $mysqli->query("SET NAMES 'utf8'");
$ssql="SELECT * FROM audiciones" ;
$result = mysqli_query($mysqli, $ssql);

  
//iterate on results row and create new index array of data
while( $row = mysqli_fetch_assoc($result) ) { 
    $data[] = $row;
    //$totalRecords++;
}   

$json_data = array(
          
        "total"     => intval( $totalRecords ),
        "rows"      => $data   // total data array
        );
//
echo json_encode($data);  // send data as json format


//print ($ssql)
?>

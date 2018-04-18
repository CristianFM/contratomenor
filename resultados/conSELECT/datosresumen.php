<?php

require("../res/id_mysql.php");

$fecha = date("Y/m/d");
$s='';
$mysqli = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);
/* comprobar la conexión */

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
$s='';

/*

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Instrumento</th>
                            <th>Inscritos</th>
                        </tr>
                    </head>
                    
                    <tbody id='datosresumen'>
                        
                    </tbody>
                      </tr>
                    </thead>
                </table>
                              <tr>
                                <td>John</td>
                                <td>1</td>
                              </tr>
                              <tr>
                                <td>Mary</td>
                                <td>3</td>
                              </tr>
                              <tr>
                                <td>July</td>
                                <td>5</td>
                              </tr>
*/
$tildes = $mysqli->query("SET NAMES 'utf8'");
$ssql="SELECT instrumento, COUNT(instrumento) FROM audiciones GROUP BY instrumento";
$result = mysqli_query($mysqli, $ssql);
$s.='<table class="table table-striped table-bordered">';
$s.='<thead>';
$s.='<tr>';
$s.='<th>Instrumento</th>';
$s.='<th>Inscritos</th>';
$s.='</tr>';
$s.='</thead>';
$s.= '<tbody>';
while( $row = mysqli_fetch_assoc($result) ) { 
	 $s.='<tr>';
	 $s.='<td>'.$row["instrumento"].'</td>';
     $s.='<td>'.$row["COUNT(instrumento)"].'</td>';
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
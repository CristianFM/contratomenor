<?php

    require("../res/id_mysql.php");
    //$falta = "02668157L";
    //$dni="02668157L";
    //$ssql= 'UPDATE audiciones SET falta="$falta" WHERE dni="$dni"' ; 
    $falta=$_POST['value'];
    $id=$_POST['pk'];
    $ids = json_decode($_POST['ids']);
    $dato = $_POST['dato'];

    if( isset($_POST['value']) && isset($_POST['pk']) )
    {
        
        $conn = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);

        if ($conn->connect_error) {
            die("Connection fallida: " . $conn->connect_error);
        }

        //foreach ($dni as $value) {
            $ssql= 'UPDATE audiciones SET falta="'.$falta .'" WHERE id="'.$id.'"' ;        
            if ($conn->query($ssql) === TRUE) {
                echo print($ssql);
            } else {
                echo "Error: " . $ssql . "<br>" . $conn->error;
            }
            $conn->close();    
        //}
    }
    if( isset($_POST['ids']) && isset($_POST['dato']) )
    {
        
        $conn = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);

        if ($conn->connect_error) {
            die("Connection fallida: " . $conn->connect_error);
        }

        foreach ($ids as $value) {
            $ssql= 'UPDATE audiciones SET falta="'.$dato .'" WHERE id="'.$value.'"' ;        
            if ($conn->query($ssql) === TRUE) {
                $resultado =['ha salido bien,0'];
            } else {
                $resultado= ["Error: ", $ssql];
            }    
        }
        $conn->close();
    }
    $resultado = "[ $ssql ]";
    //$ssql= 'UPDATE audiciones SET falta="'.$falta .'" WHERE dni="'.$dni.'"' ;

    echo json_encode($resultado);

?>

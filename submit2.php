<?php
    require("res/id_mysql.php");

if (empty($_FILES['images'])) {
    // Devolvemos un array asociativo con la clave error en formato JSON como respuesta 
    echo json_encode(['error'=>'ERROR, ha superado el tamaño maximo de ficheros, reduzca sus pdf o elimine algun fichero..']); 
    // Cancelamos el resto del script
    return; 
}

    $fecha     = date("Y/m/d");
    $resultado = "Error, contacte con el administrador audiciones@ofgrancanaria.com";
if( isset($_POST['nombre']) && isset($_POST['email']) 
&& isset($_POST['nacionalidad']) && isset($_POST['ciudad']) && isset($_POST['telefono']) 
&& isset($_POST['cp']) && isset($_POST['dni']) && isset($_POST['instrumento'])
&& isset($_POST['ronda1']) && isset($_POST['ronda2'])
&& isset($_POST['pianista_nombre']) && isset($_POST['pianista_dni']) )
{
        // hago la pareja nombre = valor que viene del POST
        foreach($_POST as $nombre_campo => $valor){
           $asignacion = "\$" . $nombre_campo . "='" . utf8_decode($valor) . "';";
           eval($asignacion); 
           $array[] = $asignacion;
         }; 
         // Compruebo si esiste carpeta y subo los ficheros

        $nombre_carpeta = "uploads/". $dni ."/";

        if(!is_dir($nombre_carpeta)){
            @mkdir($nombre_carpeta, 0777);
            fopen($nombre_carpeta."index.php","w+");
        }

        foreach($_FILES['images']['error'] as $key => $error){
            if($error == UPLOAD_ERR_OK){
                $name = $_FILES['images']['name'][$key];
                move_uploaded_file($_FILES['images']['tmp_name'][$key], $nombre_carpeta . $name);
            }
        }
       
        /*
        // version para servidores viejos
        $con = @mysql_connect($mysql_server, $mysql_login, $mysql_psw);        
        if(!$con){ 
            print("La base de datos no está disponible en estos momentos.<br>Sentimos las molestias ocasionadas. Vuelva a intentarlo más tarde.");
            exit();
        } else { // hay coneccion y entro a guardar los datos a la base de datos
            mysql_select_db("audiciones",$con);
            $ssql ="INSERT INTO audiciones (nombre,email,nacionalidad,ciudad,telefono,cp,dni,instrumento,pianista,ronda1,ronda2,pianista_nombre,pianista_dni,fecha) ";
            $ssql.="VALUES ('$nombre','$email','$nacionalidad','$ciudad','$telefono','$cp','$dni','$instrumento','$pianista','$ronda1','$ronda2','$pianista_nombre','$pianista_dni','$fecha')";
            mysql_query($ssql);
        }
        */


        // version para nuevos servidores
        // Create connection
        $resultado=['ha insertado correctamente',0];
        $conn = new mysqli($mysql_server, $mysql_login, $mysql_psw, $mysql_base);

        if ($conn->connect_error) {
            die("Connection fallida: " . $conn->connect_error);
        }
        $ssql ="INSERT INTO audiciones (nombre,email,nacionalidad,ciudad,telefono,cp,dni,instrumento,ronda1,ronda2,pianista_nombre,pianista_dni,fecha) ";
        $ssql.="VALUES ('$nombre','$email','$nacionalidad','$ciudad','$telefono','$cp','$dni','$instrumento','$ronda1','$ronda2','$pianista_nombre','$pianista_dni','$fecha')";
        if ($conn->query($ssql) === TRUE) {
            echo json_encode($resultado);
        } else {
            echo "Error: " . $ssql . "<br>" . $conn->error;
        }
        $conn->close();    
        //echo json_encode($array);
        //@mysql_close ($con);
        require("res/envia_correo.php") ;
} 
    //echo json_encode($resultado);
    //echo "error en el paso de datos" ;



?>
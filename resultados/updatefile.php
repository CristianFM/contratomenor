<?php

if (empty($_FILES['images'])) {
    // Devolvemos un array asociativo con la clave error en formato JSON como respuesta 
    echo json_encode(['error'=>'ERROR, ha superado el tamaño maximo de ficheros, reduzca sus pdf o elimine algun fichero..']); 
    // Cancelamos el resto del script
    return; 
}

    $fecha     = date("Y/m/d");
    $resultado = "Error, contacte con el administrador audiciones@ofgrancanaria.com";
if( isset($_POST['dni']) )
{
        // hago la pareja nombre = valor que viene del POST
        foreach($_POST as $nombre_campo => $valor){
           $asignacion = "\$" . $nombre_campo . "='" . utf8_decode($valor) . "';";
           eval($asignacion); 
           $array[] = $asignacion;
         }; 
         // Compruebo si esiste carpeta y subo los ficheros

        $nombre_carpeta = "../uploads/". $dni ."/";

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
       
        // Create connection
        $resultado=['ha insertado correctamente',0];
       

} else  $resultado=['error no ha entrado indice',0];

echo json_encode($resultado);

?>
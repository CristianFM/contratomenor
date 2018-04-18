<?


// datos pra pruebas
    //$email='jmonche@gmail.com';
    //$pianista_nombre ="";
    //$nombre = 'ESPAÑA';
// ----------------------------

//Preparamos imagen para ponerla como firma del correo.
  	$filename=file_get_contents("img/audiciones.jpg");
  	$filename64=base64_encode($filename);
  	
	$destinatario = $email;
  if ($pianista_nombre != "") {
    $cuerpop =  '* Pianista nombre: ' . $pianista_nombre . '<br>';
    $cuerpop .= '* Pianista dni  : ' . $pianista_dni . '<br>';
  } else {
    $cuerpop =  '* Obra Ronda 1: ' . $ronda1 . '<br>';
    $cuerpop .= '* Obra Ronda 2: ' . $ronda2 . '<br>';    
  }
// aunto del correo
   	$asunto = "Audiciones F.C.Orquesta Filarmónica de Gran Canaria 2017";
// Cabecero  	       
 	$headers = "MIME-Version: 1.0\r\n";        
    //$headers .= "Content-type: text/html; charset=ISO-8859-1\r\n"; 
    $headers .= "Content-type: text/html; charset=utf-8\r\n";     
    $headers .= "From: Departamento artistico <audiciones@ofgrancanaria.com>\r\n";     
    $headers .= "Bcc: audiciones@ofgrancanaria.com\r\n"; 
// cuerpo del mensaje
    $cuerpoCabeza=' 
        <html>
            <head>
            </head>
            <body>
                <font color="black" size="2" face="helvetica,arial">';

    $cuerpoDato.="Su solicitud se ha procesado e incluido en nuestra base de datos.<br><br>
    * nombre : $nombre <br> 
    * DNI / Pasaporte : $dni <br>
    * Telefono : $telefono <br> 
    * Email : $email <br> 
    * instrumento : $instrumento <br> ";

    $cuerpoDato.=$cuerpop ;
    
    $cuerpofirma='
                </font>
                <p> 
                <br><br><br>
            <font color="Gray" size="1" face="helvetica,arial">
                * Le informamos que Ud. tiene derecho de acceso, rectificación, cancelación y oposición de los datos personales incorporados a la base de datos de la Fundación Orquesta Filarmónica de Gran Canaria, con la finalidad de obtención de datos para la información de nuestros servicios. Para ejercitar este derecho puede dirigirse por escrito a la Fundación Orquesta Filarmónica de Gran Canaria, Paseo Príncipe de Asturias s/n, 35010 de Las Palmas de Gran Canaria (Ley Orgánica 15/1999).
                <br><br><br> 
            </font>
            </p>
                <img style="width: 984px; height: 184px;" alt="" src="data:image/jpg;base64,'.$filename64.'"><br>
                    
    ';
    $cuerpoFin='
            </body> 
  </html>
    ';

    $cuerpo = $cuerpoCabeza . utf8_encode($cuerpoDato) . $cuerpofirma . $cuerpoFin; 
    mail($destinatario,$asunto,$cuerpo,$headers);

    /* if (mail($destinatario,$asunto,$cuerpo,$headers)){ 
            print($cuerpoCabeza . $cuerpoDato . $cuerpoFin);
        }else {
            print('no se ha podido enviar el correo de confirmación en estos momentos.<br>Sentimos las molestias ocasionadas. Por favor, póngase en contacto con la Sra. Miriam en la dirección de correo audiciones@ofgrancanaria.com');
        };
    */       
?>
<?php

$dni=$_POST['directorio'];
$directorio=opendir("../uploads/".$dni."/.");
$ruta="../uploads/".$dni."/";
//$directorio = opendir("../uploads/43757982T/."); //ruta actual


$s='<div class="row">' ;
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    $ext = strtolower(pathinfo( $archivo, PATHINFO_EXTENSION ));
    if (!is_dir($archivo) )//verificamos si es o no un directorio
    	if ( ($ext == 'png') || ($ext == 'jpg') || ($ext == 'pdf'))
    {
		$s.= ' <div class="col-md-3">' ;
    	$s.=	'<div class="card">' ;
    	$s.=	' <div class="card-header"></div> ';
		if ($ext != 'pdf') $s.= '<a href="'.$ruta.$archivo.'"> <img class="" alt="'.$archivo.'" width="100" src="'.$ruta.$archivo.'" ' ;
		else  			   $s.= '<a href="'.$ruta.$archivo.'"> <img class="" alt="" width="100"  src="../img/pdf-logo.png" ' ;
		$s.=      '<div class="caption">' ;
		$s.=    '</div>' ; 
		$s.=        '<div class="card-body">'.$archivo.'</div>' ;
		$s.=     ' </div>' ;
		$s.=    '</div>' ; 
		$s.=  '</div>' ;

    }
$s.='</div>' ;

}


print($s);
?>


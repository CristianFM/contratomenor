<!DOCTYPE html>
<!-- release v4.4.6, copyright 2014 - 2017 Kartik Visweswaran -->
<!--suppress JSUnresolvedLibraryURL -->
<html lang="es">
<head>

    <meta charset="UTF-8"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <title>Audiciones 2017 OFGC</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="css/fileinput-rtl.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">


<!-- Latest compiled and minified JavaScript -->



    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="js/plugins/sortable.js" type="text/javascript"></script>
    <script src="js/fileinput.js" type="text/javascript"></script>
    <script src="js/locales/es.js" type="text/javascript"></script>
    <script src="themes/explorer-fa/theme.js" type="text/javascript"></script>
    <script src="themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>

    <style type="text/css">
      body {
    /* el tamaño por defecto es 14px */
    font-size: 10px;
      }
    </style>

</head>

<script type="text/javascript">
  // solo por si necesito poner java en la prncipal... ahora uso scrips_jx.js
</script>

<body>
    <form id='form-audiciones' class="form-horizontal" method="post" action="">
<div class="Xcontainer"> <!-- quito el container para que ocupe el completo de la web corp -->
    <div class="card">
         <div class="row">
           <div class="col-sm-12"> 
                   <h3 class="card-header primary-color white-text text-center">Audiciones 2017</h3>
                   <div class="card-body">
                       <div class="row">
                           <div class="col-sm-12">
                                       <h4 class="card-title">Datos Personales</h3>
                           </div>
                       </div>
                   
                       <div class="row"> <!--fila 1 -->
                           <div class="col-sm-6">
                               <div class="form-group"> <!-- Full Name -->
                                   <label for="nombre" class="control-label">Nombre Completo / Full name</label>
                                   <input value="" type="text" class="form-control" id="nombre" name="nombre" placeholder="John Martin" >
                                   <span class="help-block" id="error"></span>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group"> <!-- Email -->
                                   <label for="email" class="control-label">Correo electrónico / Email</label>
                                   <input value="" type="email" class="form-control" id="email" name="email" placeholder="nombre@dominio.com" >
                                   <span class="help-block" id="error"></span>
                               </div>
                           </div>
                       </div>

                       <div class="row"> <!--fila 2 -->
                           <div class="col-sm-6">
                               <div class="form-group"> <!-- Nacionalidad -->
                                   <label for="nacionalidad" class="control-label">Nacionalidad</label>
                                   <input value="" type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad" >
                                   <span class="help-block" id="error"></span>         
                               </div>
                           </div>

                           <div class="col-sm-6"> 
                               <div class="form-group"> <!-- Ciudad -->
                                   <label for="ciudad" class="control-label">Ciudad / City</label>
                                   <input value="" type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" >
                                   <span class="help-block" id="error"></span>
                               </div>
                           </div> 

                       </div>

                       <div class="row"> <!--fila 3 -->
                           <div class="col-sm-6">
                               <div class="form-group"> <!-- Telefono -->
                                   <label for="telefono" class="control-label">Teléfono / Phone</label>
                                   <input value="" type="text" class="form-control" id="telefono" name="telefono" placeholder="+34 12345633" >
                                   <span class="help-block" id="error"></span>
                               </div>
                           </div>

                           <div class="col-sm-6"> 
                               <div class="form-group"> <!-- Codigo postal -->
                                   <label for="cp" class="control-label">Código postal / Postal code</label>
                                   <input value="" type="text" class="form-control" id="cp" name="cp" placeholder="35010" >
                                   <span class="help-block" id="error"></span>
                               </div>
                           </div> 

                       </div>    

                       <div class="row"> <!--fila 4 -->
                           <div class="col-sm-6">
                               <div class="form-group"> <!-- DNI y FILE -->
                                   <label for="dni" class="control-label">DNI / Passport</label>
                                   <input value="" type="text" class="form-control" id="dni" name="dni" placeholder="DNI / Passport" >
                                   <span class="help-block" id="error"></span>
                               </div>
                           </div> 

                           <div class="col-sm-6"> <!-- FICHERO -->
                             
                              <div class="form-group">
                                <label for= "images" class="control-label ">Documentos / Documents </br>[formatos admitidos: pdf, png y jpg, max. 19 MB en total]</label>

                                <div class="file-loading"> 

                                    <input id="images" name="images[]" type="file" multiple> 
                                    
                                </div>
                                
                              </div> 
                           </div>
                         

                       </div>                       
                   </div>
           </div>
         </div>  
    </div>
    <div class="card">
            <div class="card-body">
                       <div class="row">
                           <div class="col-sm-12">
                                       <h4 class="card-title">Datos para la audición</h3>
                           </div>
                       </div>
                       <div class="row"> 
                           <div class="col-sm-6">
                               <div class="form-group"> 
                                   <label for="instrumento" class="control-label">Instrumento / Instrument</label>
                                   <div class="container">

                                    <select name="instrumento" id="instrumento" class ="form-control">
                                        <!-- option disabled selected>Seleccione el instrumento</option -->
                                        <option value"Concertino" >Concertino</option>
                                        <option value"Violin">Violín solista</option>
                                        <option value"Violin_tutti">Violín tutti</option>
                                        <option value"Viola">Viola solista</option>
                                        <option value"Viola_tutti">Viola tutti</option>
                                        <option value"Contrabajo">Contrabajo solista</option>
                                        <option value"Oboe">Oboe/Corno Inglés</option>
                                        <option value"Flauta">Flauta/Flautín</option>
                                    </select>
   
                                   </div>
                               </div>
                           </div>
                           
                           <div class="col-sm-6"> <!-- Radio Buttons para pianista acompañante -->
                               <div class="form-group"> 
                                    <label for="pianista" class="control-label">Pianista acompañante</label>
                                    <div class="form-check"> 
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pianista" id="pofgc" value="pofgc">
                                        Pianista facilitado por la Orquesta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pianista" id="ppropio" value="ppropio">
                                        Pianista a mi cargo
                                        </label>
                                    </div>
                                    <span class="help-block" id="error"></span>
                                    
                               </div>
                            </div> <!-- Fin Radio Buttons -->
                       </div>
                       <div id="obras"> <!-- Div para ocultar solicita obras -->
                            <div class="row">                           
                                <div class="col-sm-6">
                                    <div class="form-group"> <!--Ronda 1 de obra -->
                                        <label for="ronda1" class="control-label">Concierto primera Ronda / Piece 1st Round:</label>
                                        <input value="" type="text" class="form-control" id="ronda1" name="ronda1" placeholder="">
                                    </div>
                                </div> 

                                <div class="col-sm-6">
                                    <div class="form-group"> <!--Ronda 2 de obra -->
                                        <label for="ronda2" class="control-label">Concierto segunda Ronda / Piece 2nd Round:</label>
                                        <input value="" type="text" class="form-control" id="ronda2" name="ronda2" placeholder="">
                                     </div>
                                </div>                           
                            </div>                        
                       </div> <!-- Fin div para ocultar solicita obras -->  
                       
                       <div id="pianista"> <!-- Div para ocultar Nombre del pianista -->
                            <div class="row">                           
                                <div class="col-sm-6">
                                    <div class="form-group"> <!-- Nombre pianista -->
                                        <label for="pianista_nombre" class="control-label">Nombre pianista / Pianist name:</label>
                                        <input type="text" class="form-control" id="pianista_nombre" name="pianista_nombre" placeholder="">
                                    </div>
                                    <span class="help-block" id="error"></span>
                                </div> 

                                <div class="col-sm-6">
                                    <div class="form-group"> <!-- Pasaporte pianista -->
                                        <label for="pianista_dni" class="control-label">Pasaporte pianista / Pianist passport: :</label>
                                        <input type="text" class="form-control" id="pianista_dni" name="pianista_dni" placeholder="">
                                     </div>
                                     <span class="help-block" id="error"></span>
                                </div>                           
                            </div>                        
                       </div> <!-- Fin div para ocultar Nombre del pianista --> 



            </div>
        <div class="form-footer">
           <button type="submit" class="btn btn-info" >
           <span class="glyphicon glyphicon-log-in" ></span> Enviar Formulario !
           </button>
        </div>         
        <div class="card-footer text-muted"> <!--Pie del car -->
           <p><small>Le informamos que Ud. tiene derecho de acceso, rectificación, cancelación y oposición de los datos personales incorporados a la base de datos de la 
           Fundación Orquesta Filarmónica de Gran Canaria, con la finalidad de obtención de datos para la información de nuestros servicios.
           Para ejercitar este derecho puede dirigirse por escrito a la Fundación Orquesta Filarmónica de Gran Canaria, Paseo Príncipe de Asturias s/n, 
           35010 de Las Palmas de Gran Canaria (Ley Orgánica 15/1999).</small> </p>
        </div> <!--Pie del car -->
        
    </div>
</div>
       
</form>
<!--INICIO Ventana modal paa respuesta -->

 <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h3> Formulario audiciones</h3>
           </div>
           <div id="contenido_modal" class="modal-body">
              <h4>ERROR</h4>
                  
       </div>
           <div class="modal-footer">
            <a id="volvermodal" href="#" data-dismiss="modal" class="btn btn-danger">Volver al formulario</a>
            <a id="cerrarmodal" href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a> 
           </div>
      </div>
   </div>
</div>

<!-- FIN Ventana modal paa respuesta -->
</body>

</html>

    <script src="js/jx2.js" type="text/javascript"></script>
    <script src="js/validajx2.js" type="text/javascript"></script>

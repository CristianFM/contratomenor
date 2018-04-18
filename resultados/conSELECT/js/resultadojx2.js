$(document).ready(function () {

    var $table = $('#table'),
        $remove = $('#remove'),
        selections = [];

    $('#table').bootstrapTable({
        url: 'datos.php',
        columns: [
          

                {
                    title: 'selec',
                    checkbox: true,
                    align: 'center',
                }, {
                    field: 'id',
                    title: 'id',
                    sortable: true,
                    editable: false,
                    align: 'center',
                    filter: 
                        { 
                            type:'input',
                        } 
                }, {
                    field: 'nombre',
                    title: 'Nombre',
                    sortable: true,
                    editable: false,
                    align: 'center',
                    filter: 
                        {
                            type: "input",
                            
                        }
                }, {
                    field: 'email',
                    title: 'Email',
                    sortable: true,
                    align: 'center',
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'dni',
                    title: 'DNI/ Pasaporte',
                    sortable: true,
                    align: 'center',
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'instrumento',
                    title: 'Instrumento',
                    sortable: true,
                    align: 'center',
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'nacionalidad',
                    title: 'Nacionalidad',
                    sortable: true,
                    align: 'center',
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'ciudad',
                    title: 'Ciudad',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'telefono',
                    title: 'Telefono',
                    sortable: true,
                    editable: true,
                    align: 'center',
                    visible: false,
                    filter: 
                        { 
                            type:'input',
                        }

                }, {
                    field: 'cp',
                    title: 'Codigo Postal',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'pianista_nombre',
                    title: 'Pianista',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'pianista_dni',
                    title: 'Pianista DNI',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'ronda1',
                    title: 'Ronda 1',
                    sortable: true,
                    align: 'center',
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'ronda2',
                    title: 'Ronda 2',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filter: 
                        { 
                            type:'input',
                        }

                }, {
                    field: 'fecha',
                    title: 'Fecha',
                    sortable: true,
                    align: 'center',
                    filter: 
                        { 
                            type:'input',
                        }
                }, {
                    field: 'falta',
                    title: 'Falta',
                    sortable: true,
                    align: 'center',
                    filter: 
                        { 
                        type: "select",
                        data: ["OK", "DNI", "CV","PR",","]
                        },
                    editable: 
                        {
                            url: 'update.php',
                            pk: 1,
                            id: 'dni'
                        },

                }],
                filter: true    

    });

    $('#table').on('expand-row.bs.table', function (e, index, row, $detail) {

        $.ajax({
            url : "filedir.php",
            type: "POST",
            data : { directorio: row.dni },
            success: function(data, textStatus, jqXHR)
            {
                 $detail.html(data);

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                 $detail.html('No he encontrado ningun documento...');
            }
        });
    });


/*
    $('#table').on('click-row.bs.table', function (e, row, $element) {
        $('.success').removeClass('success');
        $($element).addClass('success');
    });
*/
    $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table', function () {
        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
             console.log('Ha entrado');
        // save your data, here just save the current page
        selections = getIdSelections();
        // push or splice the selections if you want to save all data selections
    });

    $('#botonresumen').on('click' , function(){  

        $.ajax({
            url : "datosresumen.php",
            type: "POST",
            data : {},
            success: function(data, textStatus, jqXHR)
            {
                $('#datosresumen').html(data);
                $("#mostrarmodalresumen").modal("show");
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            alert ('error');
            }
        });

    });


  

    //------- boton que abre la ventana modal para editar campo FALTA -------
    $('#modificarestado').on('click' , function(){ 
        
        var rows = $table.bootstrapTable('getSelections');
        var dato = $('#faltainput').val();
        var filas =[]; 
        $.each(rows, function(index, row){               
            var nuevaLongitud = filas.push(row.id);
        });
        var filasJson = JSON.stringify(filas);
        $("#footer").html("Va a modificar los ID: "+ filasJson);
        $("#mostrarmodal").attr('data_id', filasJson);
        $("#mostrarmodal").modal("show");
     
    }); 

    //------- boton del input de la ventana modal -------
    $('#buttonmodal').on('click' , function(){
        var dato = $('#inputmodal').val();
        var id = $("#mostrarmodal").attr("data_id");
        var filasJson = JSON.stringify(id);
        $.ajax({
            url : "update.php",
            type: "POST",
            data : {
                dato : dato,
                ids : id,
            },
            success: function(data, textStatus, jqXHR)
            {
                $table.bootstrapTable('refresh');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            alert ('error');
            }
        }); 
    });

    function totalNameFormatter(data) {
        return data.length;
    }


    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.dni
        });
    }
    

});


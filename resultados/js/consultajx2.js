$( window ).on( "load", function() {

    var $table = $('#table'),
        $remove = $('#remove'),
        selections = [];

    window.operateEvents = {
        'click .like': function (e, value, row, index) {

            //alert('You click like action, row: ' + JSON.stringify(row));
            //alert('You click like action, row: ' + row.dni)

            $("#modalfile").attr('data-id', row.dni)
            $("#modalfile").modal("show");
            //$('#myModal').on('shown.bs.modal', function(e) {
            //  alert("alert");
            //})
        },
    };
    

    var tablaPrincipal = { 
        url: 'datos.php',
        filterControl: true,
        columns: [
                 {
                    field: 'id',
                    title: 'id',
                    sortable: true,
                    editable: false,
                    align: 'center',
                    type: 'select',
                    filterControl: 'input'
                         
                }, {
                    field: 'nombre',
                    title: 'Nombre',
                    sortable: true,
                    editable: false,
                    align: 'center',
                    filterControl: 'input'

                }, {
                    field: 'email',
                    title: 'Email',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filterControl: 'input'

                }, {
                    field: 'dni',
                    title: 'DNI/ Pasaporte',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filterControl: 'input'

                }, {
                    field: 'instrumento',
                    title: 'Instrumento',
                    sortable: true,
                    align: 'center',
                    filterControl: 'input'

                }, {
                    field: 'nacionalidad',
                    title: 'Nacionalidad',
                    sortable: true,
                    align: 'center',
                    filterControl: 'input'

                }, {
                    field: 'ciudad',
                    title: 'Ciudad',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filterControl: 'input'

                }, {
                    field: 'telefono',
                    title: 'Telefono',
                    sortable: true,
                    editable: true,
                    align: 'center',
                    visible: false,
                    filterControl: 'input'

                }, {
                    field: 'cp',
                    title: 'Codigo Postal',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filterControl: 'input'

                }, {
                    field: 'pianista_nombre',
                    title: 'Pianista',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filterControl: 'input'
                }, {
                    field: 'pianista_dni',
                    title: 'Pianista DNI',
                    sortable: true,
                    align: 'center',
                    visible: false,
                    filterControl: 'input'

                }, {
                    field: 'ronda1',
                    title: 'Ronda 1',
                    sortable: true,
                    align: 'center',
                    filterControl: 'select'

                }, {
                    field: 'ronda2',
                    title: 'Ronda 2',
                    sortable: true,
                    align: 'center',
                    visible: true,
                    filterControl: 'select'

                },{
                    field: 'falta',
                    title: 'Falta',
                    sortable: true,
                    align: 'center',
                    strictSearch : true,
                    filterControl: 'input',

                }],
    };

    $('#table').bootstrapTable ( tablaPrincipal );
/*
    setTimeout(function () {
            $table.bootstrapTable('resetView');
    }, 200);
*/

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

    $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table', function () {
        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
             console.log('Ha entrado');
        // save your data, here just save the current page
        selections = getIdSelections();
        // push or splice the selections if you want to save all data selections
    });
*/
    $('#botontableprincipal').on('click' , function(){  
        $('#table1').bootstrapTable('destroy');
        $('#table2').bootstrapTable('destroy');
        $('#table').bootstrapTable( tablaPrincipal );
    });


    $('#botonmostraronda1').on('click' , function(){  

        $('#table').bootstrapTable('destroy');
        
        $('#table1').bootstrapTable({
            url: 'obrasronda.php',  
            method: 'GET',
            queryParams : queryObras1 ,
            filterControl: true,
            detailView: false,
            columns: 
                [
                    {

                        field: 'obra1',
                        title: 'Obra',
                        sortable: true,
                        editable: false,
                        align: 'center',
                        filterControl: 'input'
                             
                    }, {

                        field: 'cantidad1',
                        title: 'Cantidad de veces',
                        sortable: true,
                        editable: false,
                        align: 'center',
                        filterControl: 'input'
                             
                    }
                ]
        });
        $('#table2').bootstrapTable({
            url: 'obrasronda.php',  
            method: 'GET',
            queryParams : queryObras2,
            filterControl: true,
            detailView: false,
            columns: 
                [
                    {

                        field: 'obra2',
                        title: 'Obra Ronda 2',
                        sortable: true,
                        editable: false,
                        align: 'center',
                        filterControl: 'input'
                             
                    }, {

                        field: 'cantidad2',
                        title: 'Cantidad de veces',
                        sortable: true,
                        editable: false,
                        align: 'center',
                        filterControl: 'input'
                             
                    }
                ]
        });
        

    });

    $('#botonresumen').on('click' , function(){  

        $.ajax({
            url : "datosresumen.php",
            type: "POST",
            data : {
                ronda : 'ronda1'   
            },
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

    function operateFormatter(value, row, index) {
        return [
            '<a class="like" href="javascript:void(0)" title="Like">',
            '<i class="glyphicon glyphicon-picture"></i>',
            '</a>  '
        ].join('');
    }

    function queryObras1(params) {
        params.ronda1 = 'ronda1'; // add param1
         //console.log(JSON.stringify(params));
        // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
        return params;
    }
    function queryObras2(params) {
        params.ronda2 = 'ronda2'; // add param1
         //console.log(JSON.stringify(params));
        // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
        return params;
    }

});


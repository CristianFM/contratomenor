$( window ).on( "load", function() {

        $("#images").fileinput({
            'theme': 'explorer-fa',
            language: 'es',  
            required: true,
            //maxFileCount: 5,
            maxFileSize : 19000000,
            //maxFilePreviewSize : 100,
            indicatorErrorTitle: 'Error en la subida de ficheros',
            uploadUrl: 'updatefile.php',
            validateInitialCount: true,
            uploadAsync: false,         
            overwriteInitial: false,
            initialPreviewAsData: true,
            removeFromPreviewOnError: true,
            allowedFileExtensions: ["jpg","png","pdf"],
            'showUpload':true, 
            'showCaption': true,
            'showCancel': true,
            'showRemove': true,
            fileActionSettings : {
            // Para quitar el botoncito de subir en la imagen
            showUpload : false,
            }, 
            uploadExtraData: function (previewId, index) {
                var info = 
                {
                    dni: $("#modalfile").attr('data-id'),
                };
                return info;
        }
         
    });



});
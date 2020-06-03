<?php
// Conexion mysqli
include ("../conexion/conexionli.php");
$fecha=date("Y-m-d"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Importar y Exportar Temas</title>
     <!-- Bootstrap-4 -->
     <link rel="stylesheet" href="../plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css">
     <!-- Alertifyjs -->
     <link rel="stylesheet" href="../plugins/alertifyjs/css/alertify.min.css">
     <link rel="stylesheet" href="../plugins/alertifyjs/css/themes/default.min.css">
     <!-- fontawesome -->
     <link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
     <!-- Select 2 -->
     <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2.min.css">
     <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2-bootstrap4.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="../plugins/animate/animate.css">
    <!-- fileinput -->
    <link href="../plugins/bootstrap-fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../plugins/bootstrap-fileinput-master/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <!-- sweet alert -->
    <link href="../plugins/bootstrap-sweetalert-master/dist/sweetalert.css" media="all" rel="stylesheet" type="text/css"/>
</head>

<style>

@font-face {
  font-family: "Pixel LCD-7";
  src: url("fonts/Pixel LCD-7.ttf");
}

.encabezado{
    background    : #343A40;
    border-radius : 0px;
    margin        : 0px;
    padding-top   : 10px;
    padding-bottom: 0px;
    color         : #fff;
    font-family   : "Pixel LCD-7", serif;
    font-size     :25px;
}

.contenedor{
    border-top:.1em solid #343A40 ;
    border-bottom:.1em solid #343A40 ;
    border-left:.1em solid #343A40 ;
    border-right:.1em solid #343A40 ;
    padding: 32px;
    border-radius: 0px;
    margin-bottom: 8px;
}

.centrar{
    text-align:center;
}

</style>

<body class="animated  fadeIn">

    <div class="jumbotron encabezado">
        <div class="col text-center">
            <h1 class="display-5">
                    <label id="lblTitular">Importar y Exportar Temas
            </h1>
        </div>
    </div>

    <div id="wrapper" class="container animated  fadeIn contenedor" style="margin-top:100px">
    
        <form>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong><label for="listaTemas">Seleccione un tema:</label></strong>
                </div>
            </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <select  id="listaTemas" class="select2" style="width: 100% ; margin-bottom: 10px">
                            <option value="1">Obscuro Clasico</option>
                            <option value="4">ITLinares Alternativo</option>
                            <option value="9">CHyP</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <button type="button" class="btn btn-outline-dark btn-block btnEspacio" id="btnExportar">
                            <i class="fas fa-file-export"></i>
                            Exportar Tema
                        </option>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <button type="button" class="btn btn-outline-dark btn-block btnEspacio" id="btnImportar">
                            <i class="fas fa-file-import"></i>
                            Importar Tema
                        </option>
                    </div>
                </div>
        </form>
    </div>

    <div class="modal" id="modalCarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
        <div class="modal-dialog modal-sm modal-dialog-centered" >
            <div class="modal-content modal-carga">

            <div class="modal-body modal-carga" style="background:#fff">
                <div class="row">
                <div class="col">
                    <div class="form-control modal-carga">
                    <p class='centrar modal-carga-letra'>
                        <i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i>
                    </p>
                    <p class="centrar animated infinite heartBeat modal-carga-letra" style="font-size:12px;">
                        Cargando...
                    </p>
                    <p id="msjCarga" class="centrar animated infinite heartBeat modal-carga-letra" style="font-size:12px;"></p>
                    </div>
                </div>
                </div>
                
            </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalArchivo" tabindex="-1" role="dialog" aria-labelledby="modalDatosCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" >
        <div class="modal-content">
        <div class="modal-header" >
            <h5 class="modal-title" id="txtTitularFoto">Importar Tema</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post" id="formSubida">
            
                <input id="image" type="file"  class="file"  data-theme="fas">
            
                <input type="hidden" class="form-control-file" name="clavePersona" id="clavePersona" >
                <input type="hidden" class="form-control-file" name="tamanoKB" id="tamanoKB" value="3000">
                <div class="col text-center">
                <button type="button" onclick="importarArchivo();" class="btn btn-outline-dark" style="margin-top:8px;">
                    <i class="fas fa-download"></i> Importar Tema
                </button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">
                <i class="fas fa-times"></i> Cerrar
            </button>
        </div>
        </div>
    </div>
    </div>
    <!-- jQuery -->
    <script src="../plugins/jQuery/jquery-3.3.1.js"></script>   
    <!-- Bootstrap-4 -->
    <script src="../plugins/bootstrap-4.0.0/dist/js/bootstrap.js"></script> 
    <!-- Alertifyjs -->  
    <script src="../plugins/alertifyjs/alertify.min.js"></script> 
    <!-- Select 2 -->
    <script type="text/javascript" src="../plugins/select2-master/dist/js/select2.full.min.js"></script>
    <!-- sweet alert -->
    <script src="../plugins/bootstrap-sweetalert-master/dist/sweetalert.js" type="text/javascript"></script>
    <!-- Funciones propias -->
    <script src="script.js" type="text/javascript"></script>
    <!-- fileinput -->
    <script src="../plugins/bootstrap-fileinput-master/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/fileinput.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/locales/es.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/themes/fas/theme.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/themes/explorer-fas/theme.js" type="text/javascript"></script>
    <!-- sweet alert -->
    <script src="../plugins/bootstrap-sweetalert-master/dist/sweetalert.js" type="text/javascript"></script>

    <script>
        $("#image").fileinput({
            'theme': 'explorer-fas',
            overwriteInitial: false,
            initialPreviewAsData: true,
            language: 'es',
            showUpload: false,
            showCaption: true,
            showCancel: false,
            showRemove: true,
            browseClass: "btn btn-dark",
            fileType: "json",
            allowedFileExtensions: ['json'],
            overwriteInitial: false,
            maxFileSize: 3000,
            maxFilesNum: 1
        });
    </script>

</body>
</html>

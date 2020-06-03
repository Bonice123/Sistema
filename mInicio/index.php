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
     <title>Acceso a Datos</title>
     <!-- Bootstrap-4 -->
     <link rel="stylesheet" href="../plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css">
     <!-- Estilos propios -->
     <link rel="stylesheet" href="../css/estilos.css">
     <!-- Alertifyjs -->
     <link rel="stylesheet" href="../plugins/alertifyjs/css/alertify.min.css">
     <link rel="stylesheet" href="../plugins/alertifyjs/css/themes/default.min.css">
     <!-- Fontawesome 5-->
     <link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
     <!-- DataTables -->
     <link rel="stylesheet" href="../plugins/dataTablesB4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="../plugins/dataTablesB4/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="../plugins/dataTablesB4/css/responsive.dataTables.min.css">
     <!-- Animate -->
     <link rel="stylesheet" href="../plugins/animate/animate.css">
     <!-- Bootstrap Switch Button -->
     <link rel="stylesheet" href="../plugins/bootstrap4-toggle-master/css/bootstrap4-toggle.min.css">
     <!-- Select 2 -->
     <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2.min.css">
     <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2-bootstrap4.min.css">
     <!-- fileinput -->
     <link href="../plugins/bootstrap-fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
     <link href="../plugins/bootstrap-fileinput-master/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
     <!-- sweet alert -->
     <link href="../plugins/bootstrap-sweetalert-master/dist/sweetalert.css" media="all" rel="stylesheet" type="text/css"/>
</head>

<body class="animated  fadeIn">
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
    <div id="contentLogin">
        <?php
        include'../mLogin/login.php';
        ?>
    </div>

    <div class="wrapper" id="contentSistema" style="display:none;">
    
        <nav id="sidebar">
            <?php
            include'menu.php';
            ?>
        </nav>

        <div id="content">

            <div class="jumbotron jumbotron-fluid myJT ">
                <div class="container-fluid">
                <div class="row">
                    <div class="borde">
                        <div class="col text-left">
                            <p><a class="sidebarCollapse verMenu"><i class="fas fa-bars fa-lg"></i></a> </p>
                        </div>
                    </div>
                    <div class="borde">
                        <div class="col text-right">
                        <p><a onclick="salir()" href="#" class="salirSistema"><i class="fas fas fa-power-off fa-lg"></i></a></p>
                        </div>
                    </div>
                </div>
                    
                    <div class="col text-center">
                        <h1 class="display-5">
                             <label id="lblTitular">Control de Asistencias </label> <span id="badgeInfo" class="badge badge-secondary animated flipInX">Desliza tú tarjeta</span>
                        </h1>
                    </div>
                    <input type="hidden" id="inicioIdusuario">
                    <input type="hidden" id="inicioIdDato">
                    <input type="hidden" id="inicioIdTema">
                    <div class="col text-right">
                        <span  class="badge badge-secondary">
                        <label class="lead" id="titular">Programa de ejemplo</label>
                        </span>
                    </div>
                </div>
            </div>

            <div class="container" id="asistencias">
                <section id="asistencia-AS">
                    <?php
                        include'../mAsistencias/formAsistencia.php';
                    ?>
                </section>
            </div>

            <div class="container-fluid" id="datosPersona">
                <section id="guardar-DP" style="display:none;">
                    <?php
                        include'../mDatosPersonales/formGuardar.php';
                    ?>
                </section>

                <section id="editar-DP" style="display:none;">
                    <?php
                        include'../mDatosPersonales/formEditar.php';
                    ?>
                </section>
                
                <section id="Listado-DP" class="animated  fadeIn contenedor" style="display:none;"></section>
            </div>        

            <div class="container" id="estadoCivil">
                <section id="guardar-EC" style="display:none;">
                    <?php
                        include'../mEstadoCivil/formGuardar.php';
                    ?>
                </section>

                <section id="editar-EC" style="display:none;">
                    <?php
                        include'../mEstadoCivil/formEditar.php';
                    ?>
                </section>
                
                <section id="Listado-EC" class="animated  fadeIn contenedor" style="display:none;"></section>
            </div>       

        </div>

    </div>

    <!-- Modal de carga -->
        <?php include'../modales/modalCarga.php'; ?>
    <!-- Modal de carga -->  
    <!-- Modal de datos -->
        <?php include'../mDatosPersonales/modalDatos.php'; ?>
    <!-- Modal de datos -->
    <!-- Modal de Foto -->
        <?php include'../modales/modalFoto.php'; ?>
    <!-- Modal de Foto -->
    <!-- Modal de PDF -->
        <?php include'../modales/modalPDF.php'; ?>
    <!-- Modal de PDF -->

    <!-- jQuery -->
    <script src="../plugins/jQuery/jquery-3.3.1.js"></script>   
    <!-- Bootstrap-4 -->
    <script src="../plugins/bootstrap-4.0.0/dist/js/bootstrap.js"></script> 
    <!-- Alertifyjs -->  
    <script src="../plugins/alertifyjs/alertify.min.js"></script> 
    <!-- Funciones Propias -->
    <script src="funcionesI.js"></script> <!-- Inicio -->
    <script src="../mLogin/funcionesL.js"></script> <!-- Login -->
    <script src="../mDatosPersonales/funcionesDP.js"></script> <!-- Datos Personales --> 
    <script src="../mEstadoCivil/funcionesEC.js"></script> <!-- Estado Civil -->
    <!-- DataTables -->
    <script src="../plugins/dataTablesB4/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/dataTablesB4/js/dataTables.bootstrap4.min.js"></script>
    <!-- dataTableButtons -->
    <script type="text/javascript" src="../plugins/dataTableButtons/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/jszip.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/pdfmake.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.print.min.js"></script>
    <!-- Bootstrap Switch Button -->
    <script type="text/javascript" src="../plugins/bootstrap4-toggle-master/js/bootstrap4-toggle.min.js"></script>
    <!-- pdfObject -->
    <script type="text/javascript" src="../plugins/PDFObject-master/pdfobject.min.js"></script>
    <!-- Select 2 -->
    <script type="text/javascript" src="../plugins/select2-master/dist/js/select2.full.min.js"></script>
    <!-- PrintArea -->
    <script src="../plugins/PrintArea-master/js/jquery.printarea.js" type="text/javascript"></script>
    <!-- responsivevoice se requiere conexion a internet -->
    <script src="../plugins/voice/responsivevoice.js?key=wJDGnQJT" type="text/javascript"></script>
    <!-- fileinput -->
    <script src="../plugins/bootstrap-fileinput-master/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/fileinput.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/locales/es.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/themes/fas/theme.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/themes/explorer-fas/theme.js" type="text/javascript"></script>
    <!-- popper -->
    <script src="../plugins/popper/popper.min.js" type="text/javascript"></script>
    <!-- sweet alert -->
    <script src="../plugins/bootstrap-sweetalert-master/dist/sweetalert.js" type="text/javascript"></script>
    <script>
        combo_ecivil();
        selectTwo();
    </script>

    <script>
        $("#image").fileinput({
            'theme': 'fas',
            overwriteInitial: false,
            initialPreviewAsData: true,
            language: 'es',
            showUpload: false,
            showCaption: true,
            showCancel: false,
            showRemove: true,
            browseClass: "btn btn-primary",
            fileType: "jpg",
            allowedFileExtensions: ['jpg'],
            overwriteInitial: false,
            maxFileSize: 3000,
            maxFilesNum: 1
        });

    </script>
    <script type='text/javascript'>
    $(document).ready(function(){ 
        $(window).scroll(function(){ 
            if ($(this).scrollTop() > 100) { 
                $('#scroll').fadeIn(); 
            } else { 
                $('#scroll').fadeOut(); 
            } 
        }); 
        $('#scroll').click(function(){ 
            $("html, body").animate({ scrollTop: 0 }, 600); 
            return false; 
        }); 
    });
    </script>

</body>
</html>

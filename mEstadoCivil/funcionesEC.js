//VARIABLE GLOBAL PARA NOMBRAR LOS ELEMENTOS DE LOS  FORMULARIOS
//ESTADO CIVIL-EC 
var nombreModulo_EC="Estado Civil";

$("#frmGuardar-EC").submit(function(e){

    var desc    = $("#desc").val();

    swal({
        title: "¿Estas Seguro?",
        text: "¿Deseas Guardar la información?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Si deseo guardarla",
        cancelButtonText: "Cancelar Acción",
        cancelButtonClass: "btn-outline-danger",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
      }, function (isConfirm) {
        if (isConfirm) {
        setTimeout(function () {
            swal.close();
            $.ajax({
                url:"../mEstadoCivil/guardar.php",
                type:"POST",
                dateType:"html",
                data:{desc},
                success:function(respuesta){
                    console.log(respuesta);
                    $("#guardar-EC").hide();
                    llenar_lista_EC();
                    $("#frmGuardar-EC")[0].reset();
                    selectTwo();
                    alertify.success("<i class='fa fa-save fa-lg'></i>", 2);
                    $('#desc').focus();
                    actividad  ="Se insertado un nuevo registro a la tabla "+nombreModulo_EC;
                    var idUser=$("#inicioIdusuario").val();
                    log(actividad,idUser);
        
                },
                error:function(xhr,status){
                    alert("Error en metodo AJAX"); 
                },
            });
        }, 2000);}
        else{
            alertify.error(" <i class='fa fa-times fa-lg'></i> Cancelado",2);
        }
      });

    e.preventDefault();
    return false;
});

$("#frmActualizar-EC").submit(function(e){

    var id        = $("#eIdFC").val();
    var desc    = $("#eDesc").val();

    swal({
        title: "¿Estas Seguro?",
        text: "¿Deseas Actualizar la información?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Si deseo actualizarla",
        cancelButtonText: "Cancelar Acción",
        cancelButtonClass: "btn-outline-danger",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
      }, function (isConfirm) {
        if (isConfirm) {
        setTimeout(function () {
            swal.close();
            $.ajax({
                url:"../mEstadoCivil/actualizar.php",
                type:"POST",
                dateType:"html",
                data:{id,desc},
                success:function(respuesta){
                    console.log(respuesta);
                    llenar_lista_EC();
                        $("#frmGuardar-EC")[0].reset();
                        $("#frmActualizar-EC")[0].reset();
                        alertify.success("<i class='fa fa-bolt fa-lg'></i>", 2);
                    $("#btnCancelarG-EC , #btnCancelarA-EC").click();
                    actividad  ="Se ha modificado un registro de la tabla "+nombreModulo_EC;
                    var idUser=$("#inicioIdusuario").val();
                    log(actividad,idUser);
                    
                    $('#desc').focus();
                },
                error:function(xhr,status){
                    alert("Error en metodo AJAX"); 
                },
            });
        }, 2000);}
        else{
            alertify.error(" <i class='fa fa-times fa-lg'></i> Cancelado",2);
        }
      });

    e.preventDefault();
    return false;
});

function llenar_lista_EC(){
    abrirModalCarga('Cargando Lista');
    $("#frmGuardar-EC")[0].reset();
    $("#Listado-EC").hide();
    $.ajax({
        url:"../mEstadoCivil/lista.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#Listado-EC").html(respuesta);
            $("#Listado-EC").fadeIn("slow");
            cerrarModalCarga();      
            $("#desc").focus();
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

function llenar_formulario_EC(id,edesc){
    console.log(id);
    $("#eIdFC").val(id);
    $("#eDesc").val(edesc);

    $("#lblTitular").text(nombreModulo_EC);
    $("#badgeInfo").text("Modificar datos");

    $("#guardar-EC").hide();
    $("#Listado-EC").hide();
    $("#editar-EC").fadeIn();
    $("#eDescripcion").focus();
}

function cambiar_estatus_EC(id,consecutivo){

    var valor=$("#check"+consecutivo).val();
    var contravalor=(valor==1)?0:1;
    $("#check"+consecutivo).val(contravalor);

    $.ajax({
        url:"../mEstadoCivil/cEstatus.php",
        type:"POST",
        dateType:"html",
        data:{id,contravalor},
        success:function(respuesta){
            // console.log(respuesta);
            if(contravalor==1){
                alertify.success("<i class='fa fa-check fa-lg'></i>", 2);
                $("#btnEditar-EC"+consecutivo).removeAttr('disabled');
                actividad  ="Se ha reactivado un registro de la tabla "+nombreModulo_EC;
                var idUser=$("#inicioIdusuario").val();
                log(actividad,idUser);
            }else{
                alertify.error("<i class='fa fa-times fa-lg'></i>", 2);
                $("#btnEditar-EC"+consecutivo).attr('disabled','disabled');
                actividad  ="Se ha desactivado un registro de la tabla "+nombreModulo_EC;
                var idUser=$("#inicioIdusuario").val();
                log(actividad,idUser);
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });

}

$("#btnCancelarG-EC , #btnCancelarA-EC").click(function(){
    $("#editar-EC").hide();
    $("#guardar-EC").hide();

    $("#lblTitular").text(nombreModulo_EC);
    $("#badgeInfo").text("Lista");

    $("#Listado-EC").fadeIn();
 
});


function nuevo_registro_EC(){
    $("#lblTitular").text(nombreModulo_EC);

    $("#badgeInfo").text("Nuevo registro");

    $("#Listado-EC").hide();
    $("#guardar-EC").fadeIn();
    $('#frmGuardar-EC')[0].reset();
    $("#desc").focus();
    
}

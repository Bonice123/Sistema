//VARIABLE GLOBAL PARA NOMBRAR LOS ELEMENTOS DE LOS  FORMULARIOS
//DATOS PERSONALES -DP 
var nombreModulo_DP="Datos Personales";

$("#frmGuardar-DP").submit(function(e){

    var clave    = $("#clave").val();
    var nombre    = $("#nombre").val();
    var apPaterno = $("#apPaterno").val();
    var apMaterno = $("#apMaterno").val();
    var fNac      = $("#fNac").val();
    var correo    = $("#correo").val();
    var curp      = $("#curp").val();
    var domicilio = $("#domicilio").val();
    var sexo      = $("#sexo").val();
    var ecivil    = $("#ecivil").val();

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
                url:"../mDatosPersonales/guardar.php",
                type:"POST",
                dateType:"html",
                data:{clave,nombre,apPaterno,apMaterno,fNac,correo,curp,domicilio,sexo,ecivil},
                success:function(respuesta){
                    
                    $("#guardar-DP").hide();
                    llenar_lista_DP();
                    $("#frmGuardar-DP")[0].reset();
                    selectTwo();
                    alertify.success("<i class='fa fa-save fa-lg'></i>", 2);
                    $('#nombre').focus();
                    actividad  ="Se insertado un nuevo registro a la tabla "+nombreModulo_DP;
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

$("#frmActualizar-DP").submit(function(e){

    var id        = $("#eId").val();
    var nombre    = $("#eNombre").val();
    var apPaterno = $("#eApPaterno").val();
    var apMaterno = $("#eApMaterno").val();
    var fNac      = $("#eFnac").val();
    var correo    = $("#eCorreo").val();
    var curp      = $("#eCurp").val();
    var clave     = $("#eClave").val();
    var domicilio = $("#eDomicilio").val();
    var sexo      = $("#eSexo").val();
    var ecivil    = $("#eEcivil").val();

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
                url:"../mDatosPersonales/actualizar.php",
                type:"POST",
                dateType:"html",
                data:{clave,id,nombre,apPaterno,apMaterno,fNac,correo,curp,clave,domicilio,sexo,ecivil},
                success:function(respuesta){
                    //console.log(respuesta);
                    llenar_lista_DP();
                        $("#frmGuardar-DP")[0].reset();
                        $("#frmActualizar-DP")[0].reset();
                        alertify.success("<i class='fa fa-bolt fa-lg'></i>", 2);
                    $("#btnCancelarG-DP , #btnCancelarA-DP").click();
                    actividad  ="Se ha modificado un registro de la tabla tabla "+nombreModulo_DP;
                    var idUser=$("#inicioIdusuario").val();
                    log(actividad,idUser);
                    
                    $('#nombre').focus();
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

function llenar_lista_DP(){
    abrirModalCarga('Cargando Lista');
    $("#frmGuardar-DP")[0].reset();
    $("#Listado-DP").hide();
    $.ajax({
        url:"../mDatosPersonales/lista.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#Listado-DP").html(respuesta);
            $("#Listado-DP").fadeIn("slow");
            cerrarModalCarga();      
            $("#nombre").focus();
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

function edad(fecha){
    $.ajax({
        url:"../mDatosPersonales/calcularEdad.php",
        type:"POST",
        dateType:"html",
        data:{fecha},
        success:function(respuesta){

            $("#edad").val(respuesta);
            $("#eEdad").val(respuesta);

            xedad= parseInt(respuesta);
            if (xedad < 0) {
                
                $("#edad, #eEdad , #fNac , #efNac").css("color", rojo);
            } else {
                
                $("#edad, #eEdad , #fNac , #efNac").css("color", obscuro);
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

function llenar_formulario_DP(id,nombre,apPaterno,apMaterno,fNac,edad,correo,curp,clave,domicilio,sexo,ecivil){
   
    $("#eId").val(id);
    $("#eClave").val(clave);
    $("#eNombre").val(nombre);
    $("#eApPaterno").val(apPaterno);
    $("#eApMaterno").val(apMaterno);
    $("#eFnac").val(fNac);
    $("#eEdad").val(edad);
    $("#eCorreo").val(correo);
    $("#eCurp").val(curp);
    $("#eClave").val(clave);
    $("#eDomicilio").val(domicilio);
    $("#eSexo").val(sexo);
    $("#eEcivil").val(ecivil);

    selectTwo();

    $("#lblTitular").text(nombreModulo_DP);
    $("#badgeInfo").text("Modificar datos");

    $("#guardar-DP").hide();
    $("#Listado-DP").hide();
    $("#editar-DP").fadeIn();
    $("#eNombre").focus();
}

function cambiar_estatus_DP(id,consecutivo){

    var valor=$("#check"+consecutivo).val();
    var contravalor=(valor==1)?0:1;
    $("#check"+consecutivo).val(contravalor);

    $.ajax({
        url:"../mDatosPersonales/cEstatus.php",
        type:"POST",
        dateType:"html",
        data:{id,contravalor},
        success:function(respuesta){
            // console.log(respuesta);
            if(contravalor==1){
                alertify.success("<i class='fa fa-check fa-lg'></i>", 2);
                $("#btnEditar-DP"+consecutivo).removeAttr('disabled');
                $("#btnImprimir-DP"+consecutivo).removeAttr('disabled');
                $("#btnModal-DP"+consecutivo).removeAttr('disabled');
                $("#btnFoto-DP"+consecutivo).removeAttr('disabled');
                $("#btnSonido-DP"+consecutivo).removeAttr('disabled');
                $("#icoSound-DP"+consecutivo).removeClass("fa fa-volume-mute fa-lg");
                $("#icoSound-DP"+consecutivo).addClass("fa fa-volume-up fa-lg");
                actividad  ="Se ha reactivado un registro de la tabla tabla "+nombreModulo_DP;
                var idUser=$("#inicioIdusuario").val();
                log(actividad,idUser);
            }else{
                alertify.error("<i class='fa fa-times fa-lg'></i>", 2);
                $("#btnEditar-DP"+consecutivo).attr('disabled','disabled');
                $("#btnImprimir-DP"+consecutivo).attr('disabled','disabled');
                $("#btnModal-DP"+consecutivo).attr('disabled','disabled');
                $("#btnFoto-DP"+consecutivo).attr('disabled','disabled');
                $("#btnSonido-DP"+consecutivo).attr('disabled','disabled');
                $("#icoSound-DP"+consecutivo).removeClass("fa fa-volume-up fa-lg");
                $("#icoSound-DP"+consecutivo).addClass("fa fa-volume-mute fa-lg");
                actividad  ="Se ha desactivado un registro de la tabla tabla "+nombreModulo_DP;
                var idUser=$("#inicioIdusuario").val();
                log(actividad,idUser);
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });

}

function abrirModalDatos_DP(id,nombre,apPaterno,apMaterno,fNac,edad,correo,curp,clave,domicilio,sexo,ecivil) {
    $("#modalTitle-DP").text("Datos personales - "+nombre+' '+apPaterno);

    $("#mNombre").val(nombre);
    $("#mApPaterno").val(apPaterno);
    $("#mApMaterno").val(apMaterno);
    $("#mFnac").val(fNac);
    $("#mEdad").val(edad);
    $("#mCorreo").val(correo);
    $("#mCurp").val(curp);
    $("#mClave").val(clave);
    $("#mDomicilio").val(domicilio);
    $("#mSexo").val(sexo);
    $("#mEcivil").val(ecivil);

    selectTwo();

    $("#modalDatos-DP").modal("show");
}


//Manipulacion de eventos con jquery
$("#fNac").change(function(){
    var fecha = $(this).val();
    edad(fecha);
    ;
});

$("#efNac").change(function(){
    var fecha = $(this).val();
    edad(fecha);

});

$("#btnCancelarG-DP , #btnCancelarA-DP").click(function(){
    $("#editar-DP").hide();
    $("#guardar-DP").hide();

    $("#lblTitular").text(nombreModulo_DP);
    $("#badgeInfo").text("Lista");

    $("#Listado-DP").fadeIn();
 
});


$("#clave").keydown(function() {
    var valor=$(this).val();
    soloNumeros(valor);
});

$("#curp , #eCurp").keyup(function() {

    valor=$(this);
    // Convierte en mayuscula
    valor.val(valor.val().toUpperCase());
    
    //validar curp + expresion regular
    if (curpValida(valor.val())=="Si") {
        //$("#btnGuardar-DP").removeAttr('disabled');
        $(valor).css("color", obscuro);
        alertify.success("Curp valida !",1);
    }else{
        //$("#btnGuardar-DP").attr('disabled','disabled');
        $(valor).css("color", rojo);
    }

});

$("#clave").keyup(function(){
    var valor=$(this).val();
    revisar_clave(valor);
});

//Manipulacion de eventos con jquery

//Revisar clave repetida
function revisar_clave(valor){
    $.ajax({
        url:"../mDatosPersonales/rClave.php",
        type:"POST",
        dateType:"html",
        data:{valor},
        success:function(respuesta){
            res =parseInt(respuesta);
            if (res == 0) {
                $("#clave").css("color", obscuro);
            }else{
                $("#clave").css("color", rojo);
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

//validar curp
function curpValida(valor) {

    var validador;
    var curp=valor;

    // Expresion regular para curp
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);
    
    if (!validado){  //Coincide con el formato general?
        validador = "No";
    }else{
        validador = "Si";
    }
    return validador;
}

//llenar combo
function combo_ecivil()
{
    $.ajax({
        url : '../mDatosPersonales/comboEcivil.php',
        data : {},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            
            $("#ecivil , #eEcivil , #mEcivil , #eDesc").empty();
            $("#ecivil , #eEcivil , #mEcivil , #eDesc").html(respuesta);    
            selectTwo();
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function nuevo_registro_DP(){
    $("#lblTitular").text(nombreModulo_DP);
    $("#badgeInfo").text("Nuevo registro");

    $("#Listado-DP").hide();
    $("#guardar-DP").fadeIn();
    $('#frmGuardar-DP')[0].reset();
    $("#clave").focus();
    
}

function abrirModalFoto(id,clave,nombre,valorfoto) {

    $("#clavePersona").val(clave);
    $("#txtTitularFoto").text(nombre);

    if (valorfoto=="No") {
        $('#formVista').hide();
        $('#formSubida').fadeIn();
        $('#formSubida')[0].reset();
    }else{
        $('#formSubida').hide();
        $('#formVista').fadeIn();
        var archivo='../fotos/'+clave+".jpg";
        $("#imgFoto").attr("src",archivo);
    }
    
    $("#modalFoto").modal("show");

}

function  eliminarFoto(){

    var formData = new FormData();
    var clave=$('#clavePersona').val();
    formData.append('clave',clave);

    swal({
        title: "¿Estas Seguro?",
        text: "¿Deseas eliminar la foto?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-dark",
        confirmButtonText: "Si deseo eliminarla",
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
                url: '../mDatosPersonales/fotoBorrar.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                  var res=parseInt(response);
                  switch(res){
                    case 0 :
                        alertify.error("<i class='fa fa-times fa-lg'></i> No se encuentra el archivo",1);
                        $("#modalFoto").modal("hide");
                        llenar_lista_DP();
                      break;
                    case 1 :
                        alertify.warning("<i class='fa fa-check fa-lg'></i> Foto Eliminada",1);
                        $("#modalFoto").modal("hide");
                        llenar_lista_DP();
                        break;
                  }
        
                },
                error:function(xhr,status){
                    alertify.error('Error en proceso');
                },
            });
        }, 2000);}
        else{
            alertify.error(" <i class='fa fa-times fa-lg'></i> Cancelado",2);
        }
      });

}

function subirFoto(){
    var formData = new FormData();

    var files = $('#image')[0].files[0];

    var clave=$('#clavePersona').val();
    var tam=$('#tamanoKB').val();

    formData.append('file',files);
    formData.append('clave',clave);
    formData.append('tam',tam);

    $.ajax({
        url: '../mDatosPersonales/fotoSubir.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          var res=parseInt(response);
          switch(res){
            case 0 :
                alertify.success("<i class='fas fa-file-upload'></i>",1);
                $("#modalFoto").modal("hide");
                llenar_lista_DP();
              break;
            case 1 :

                swal({
                    title: "Error!",
                    text: "No ha sido posible cargar el archivo debido a que este debe de tener extención jpg y no debe de sobrepasar los 3 megabytes",
                    type: "error",
                    confirmButtonClass: "btn-dark",
                    confirmButtonText: "Enterado"
                }, function (isConfirm) {
                    alertify.message("Gracias !");
                });
              break;
            default:
                  alertify.error("<i class='fa fa-times fa-lg'></i>",1);
          }

        },
        error:function(xhr,status){
            alertify.error('Error en proceso');
        },
    });
// return false;
}



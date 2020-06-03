<?php
//se manda llamar la conexion
//include("../conexion/conexion.php");

//verifico inicio de sesion
//include("../sesiones/verificar_sesion.php");
$clave = $_POST["clave"];
$archivo=$clave.'.jpg';
$tamano = $_POST["tam"];

if(($_FILES["file"]["type"] == "image/jpeg")) {
    if (($_FILES["file"]["size"] > $tamano)) { 
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "../fotos/".$archivo)) {
            //more code here...
            $bandera=0;
        }
    }else{
        $bandera=1;
    }
}else{
    $bandera=1;
}

echo $bandera;

?>

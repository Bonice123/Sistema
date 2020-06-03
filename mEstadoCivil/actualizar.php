<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id    	   = $_POST['id'];
$desc     = trim($_POST['desc']);

$activo    = 1;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "UPDATE ecivil
			SET
				descripcion          = '$desc',
				fecha_registro = '$fecha', 
				hora_registro  = '$hora'
			WHERE 
				id_ecivil= $id";
$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>
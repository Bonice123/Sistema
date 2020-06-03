<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$desc     = trim($_POST['desc']);

$activo    = 1;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "INSERT INTO ecivil
				(descripcion,
				activo,
				fecha_registro,
				hora_registro)
			VALUES
				('$desc',
				$activo,
				'$fecha',
				'$hora')";
$insertar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>
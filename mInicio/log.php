<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$actividad    = trim($_POST['actividad']);
$ejecuta      = $_POST['ejecuta'];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");


//Inserto registro en tabla log 
$cadena = "INSERT INTO log
				(actividad,
				usuario_ejecuta,
				fecha_registro, 
				hora_registro)
			VALUES
				('$actividad',
				 '$ejecuta',
				'$fecha', 
				'$hora')";
				
$insertar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>
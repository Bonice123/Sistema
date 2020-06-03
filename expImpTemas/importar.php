<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$nombre_tema       = trim($_POST['nombre_tema']);
$color_letra       = trim($_POST['color_letra']);
$color_base        = trim($_POST['color_base']);
$color_base_fuerte = trim($_POST['color_base_fuerte']);
$color_borde       = trim($_POST['color_borde']);
$fecha_registro    = trim($_POST['fecha_registro']);
$hora_registro     = trim($_POST['hora_registro']);
$activo    = 1;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

$cadena = "SELECT
				id_tema
			FROM
				temas
			WHERE
				nombre_tema = '$nombre_tema'";

$consultar = mysqli_query($conexionLi, $cadena);
$row_cnt = $consultar->num_rows;

if ($row_cnt==0) {
	$bandera=0;
	$cadena = "INSERT INTO temas
				(nombre_tema,
				color_letra,
				color_base, 
				color_base_fuerte, 
				color_borde, 
				fecha_registro, 
				hora_registro,
				activo)
			VALUES
				('$nombre_tema',
				'$color_letra',
				'$color_base', 
				'$color_base_fuerte', 
				'$color_borde', 
				'$fecha_registro', 
				'$hora_registro', 
				'$activo')";
$insertar = mysqli_query($conexionLi, $cadena);
}else{
	$bandera=1;
}
//Inserto registro en tabla pacientes 

echo $bandera;
//Cierro la conexion
mysqli_close($conexionLi);
?>
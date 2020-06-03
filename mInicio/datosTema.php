<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

$id=$_POST["id"];
$cadena = "SELECT id_tema,
				nombre_tema,
				color_base_fuerte,
				color_base,
				color_letra,
				color_borde 
			FROM temas 
				WHERE id_tema = $id";

$consultar = mysqli_query($conexionLi, $cadena);
//for ($arreglo = array (); $row = $consultar->fetch_assoc(); $arreglo[] = $row);
	$arreglo = $consultar->fetch_assoc();
	$data['status'] = 'ok';
	$data['result'] = $arreglo ;

//returns data as JSON format
echo json_encode($data);


?>
<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$valor = $_POST['valor'];

$fecha = date("Y-m-d"); 
$hora  = date ("H: i: s");

//seleccione registros tabla datos
$cadena = "SELECT
				id_usuario,
				id_dato,
				id_tema,
				(SELECT CONCAT(nombre,' ',ap_paterno,' ',ap_materno) FROM datos WHERE datos.id_datos=usuarios.id_dato) as persona,
				nombre_usuario,
				permiso_datos_persona,
				permiso_ecivil,
				permiso_temas,
				fecha_caducidad
			FROM
				usuarios
			WHERE
				nombre_usuario = '$valor'";

$consultar = mysqli_query($conexionLi, $cadena);
$row_cnt = $consultar->num_rows;

	$arreglo = $consultar->fetch_assoc();
	$data['cRegistros'] = $row_cnt;
	$data['result'] = $arreglo ;

//returns data as JSON format
echo json_encode($data);
?>
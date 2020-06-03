<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

include ("../funciones/diasTranscurridos.php");
//Recibo valores con el metodo POST
$usuario = $_POST['usuario'];
$contra  = $_POST['contra'];

$fecha   = date("Y-m-d"); 
$hora    = date ("H: i: s");

//seleccione registros tabla datos
$cadena = "SELECT
				id_usuario,
				id_dato,
				id_tema,
				(SELECT CONCAT(nombre,' ',ap_paterno,' ',ap_materno) FROM datos WHERE datos.id_datos=usuarios.id_dato) as persona,
				fecha_caducidad,
				nombre_usuario,
				permiso_datos_persona,
				permiso_usuario,
				permiso_ecivil,
				permiso_temas
			FROM
				usuarios
			WHERE
				nombre_usuario = '$usuario'
			AND
				contra='$contra'";

$consultar = mysqli_query($conexionLi, $cadena);


//Numero de registros obtenidos
$row_cnt = $consultar->num_rows;

	$arreglo = $consultar->fetch_assoc();

	$dias=dias_transcurridos($arreglo['fecha_caducidad'],$fecha);

	$data['cRegistros'] = $row_cnt;
	$data['dias'] = $dias;
	$data['result'] = $arreglo ;

	echo json_encode($data);

	?>

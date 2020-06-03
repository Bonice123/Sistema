<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$valor = $_POST['valor'];

$fecha = date("Y-m-d"); 
$hora  = date ("H: i: s");

//seleccione registros tabla datos
$cadena = "SELECT
				clave 
			FROM
				datos 
			WHERE
				clave = $valor";

$actualizar = mysqli_query($conexionLi, $cadena);
$row_cnt = $actualizar->num_rows;

echo $row_cnt;
//Cierro la conexion
mysqli_close($conexionLi);
?>
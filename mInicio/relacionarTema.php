<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$idUsuario  = $_POST['idUsuario'];
$idTema   	= $_POST['idTema'];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla pacientes 
$cadena = "UPDATE usuarios
			SET
				id_tema = '$idTema'
			WHERE 
				id_usuario= $idUsuario";
$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);

?>
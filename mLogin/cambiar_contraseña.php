<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id    	   = $_POST['id'];
$contra    = $_POST['contra'];



//Inserto registro en tabla pacientes 
$cadena = "UPDATE usuarios
			SET
				contra = '$contra'
			WHERE 
				id_usuario= $id";
$actualizar = mysqli_query($conexionLi, $cadena);


//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>
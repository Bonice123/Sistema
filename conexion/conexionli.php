<?php

//variables para conexion
$db_host = "localhost";
$db_name = "beta";
$db_user = "root";
$db_pass = "123456789";

//cadena de conexion
$conexionLi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
//Establece la zona horaria predeterminada usada por todas las funciones de fecha/hora
date_default_timezone_set('America/Monterrey');
//Set charset a cadena de conexion
mysqli_set_charset($conexionLi, 'utf8');
//error mysql
if(mysqli_connect_errno()){
 printf(mysqli_connect_error());
}
?>
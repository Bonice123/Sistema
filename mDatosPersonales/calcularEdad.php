<?php
// funcion de usuario
include ("../funciones/calcularEdad.php");
date_default_timezone_set("America/Monterrey");

$fecha  = $_POST['fecha'];

echo CalculaEdad( $fecha );

?>
<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$valor = $_POST['valor'];

//seleccione registros tabla datos

$cadena = "SELECT
				nombre_tema,
				color_letra,
				color_base,
				color_base_fuerte,
				color_borde,
				fecha_registro,
				hora_registro
			FROM
				temas
			WHERE
				id_tema = $valor";
$consultar = mysqli_query($conexionLi, $cadena);

$tema = array(); //creamos un array

while($row = mysqli_fetch_array($consultar)) 
{ 
    $nombre_tema=$row['nombre_tema'];
    $color_letra=$row['color_letra'];
    $color_base=$row['color_base'];
    $color_base_fuerte=$row['color_base_fuerte'];
    $color_borde=$row['color_borde'];
	$fecha_registro=$row['fecha_registro'];
	$hora_registro=$row['hora_registro'];
    

    $tema[] = array('nombre_tema'=> $nombre_tema, 'color_letra'=> $color_letra, 'color_base'=> $color_base, 'color_base_fuerte'=> $color_base_fuerte,'color_borde'=> $color_borde, 'fecha_registro'=> $fecha_registro, 'hora_registro'=> $hora_registro);

}
    
//desconectamos la base de datos
$close = mysqli_close($conexionLi) ;


//Creamos el JSON
$json_string = json_encode($tema);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:

$file = "Temas/".$nombre_tema.'.json';
file_put_contents($file, $json_string);
  

?>
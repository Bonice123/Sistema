<?php
// Conexion mysqli
include'../conexion/conexionli.php';

$nhcP=$_POST['nhc'];

$cadena = "SELECT
                id_tema,
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
                activo=1
            ORDER BY  nombre_tema";
$consultar = mysqli_query($conexionLi, $cadena);

while($row = mysqli_fetch_array($consultar))
{  
	if ($rowl[0]!=$row[0]) {
    ?>
    <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
    <?php
	}
}
?>

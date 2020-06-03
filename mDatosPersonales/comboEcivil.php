<?php
// Conexion mysqli
include'../conexion/conexionli.php';

$nhcP=$_POST['nhc'];

$cadena = "SELECT
                id_ecivil,
                descripcion,
                activo
            FROM
                ecivil 
            WHERE 
                activo=1 
            ORDER BY 
                id_ecivil";
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

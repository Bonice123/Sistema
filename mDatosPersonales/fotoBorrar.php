<?php

$clave = $_POST["clave"];
$archivo='../fotos/'.$clave.'.jpg';

$bandera="0";
if (is_file($archivo)) {
    chmod($archivo,0777);
    unlink($archivo);
    $bandera="1";
} else {
    $bandera="2";
}

echo $bandera;
?>

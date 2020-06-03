<?php 
// Conexion mysqli
include'../conexion/conexionli.php';

include ("../funciones/calcularEdad.php");
include ("../funciones/fechaEspanol.php");

$Id=$_REQUEST["id"];

                
$cadena = "SELECT
                id_datos,
                activo,
                nombre,
                ap_paterno,
                ap_materno,
                fecha_nac,
                correo,
                curp,
                clave,
                domicilio,
                IF(sexo='M', 'Masculino', 'Femenino'),
                (SELECT descripcion FROM ecivil where ecivil.id_ecivil=datos.id_ecivil)
            FROM
                datos
            WHERE
                id_datos = $Id";
$consultar = mysqli_query($conexionLi, $cadena);


//Descargamos el arreglo que arroja la consulta
$n=1;
$row = mysqli_fetch_array($consultar);
// arreglo de variables
$nombre     = $row[2];
$paterno    = $row[3];
$materno    = $row[4];
$fNac       = $row[5];
$nacimiento = date("d-m-Y", strtotime($row[5]));
$correo     = $row[6];
$curp       = $row[7];
$clave      = $row[8];
$domicilio  = $row[9];
$sexo       = $row[10];
$ecivil     = ($row[11]==null)?"Sin datos":$row[11];

$fecha=date("Y-m-d"); 

$fCastellano=fechaCastellano($fecha);

$foto       = '../fotos/'.$clave.'.jpg';

if (file_exists($foto)){
    $foto  = '../fotos/'.$clave.'.jpg';
}else{
    if ($sexo=="Masculino") {
        $foto  = '../images/hombre.jpg';
    }else{
        $foto  = '../images/mujer.jpg';
    }
}

 ?>

<style type="text/css">

table
{
    width:  90%;
    border: solid 0px #5544DD;
    margin:auto;
}

.barras{
    width:40mm;
    height:7mm;
    color#000;
    font-size:3mm
}

hr{
  border: solid 1px #34495e;
}

table.borde
{
    width:  90%;
    border: solid 1px #D8D8D8;
    margin:auto;
}

table.tarjeta {
    border-style: dashed; 
    border-top-width: 1px; 
    border-right-width: 1px; 
    border-bottom-width: 1px; 
    border-left-width: 1px
}

.TituloTarjeta{
    text-align : center;
    font-weight: bold;
    font-size  : 15px;
    margin:5px;
}

th
{
    text-align: center;
    border: solid 0px #113300;
    background: #EEFFEE;
}
th.borde
{
    text-align: center;
    border: solid 1px #D8D8D8;
    background: #EEFFEE;
}

td.borde
{
    text-align: left;
    border: solid 1px #D8D8D8;
    padding: 10px;
    text-align: center;
}
td.col1
{
    border: solid 0px red;
    text-align: right;
}

td.titular
{
    text-align: center;
    border: solid 1px #34495e;
    background: #ecf0f1;
    color:#34495e;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 3px;
    padding: 10px;

}

td.titular2
{
    text-align: center;
    border: solid 0px #34495e;
    background: #fff;
    color:#000;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 3px;
    padding: 15px;
    font-size:20px;

}

label.enfa{
    text-decoration: underline;
}

td.subtitular
{
    text-align: center;
    border: solid 1px #34495e;
    background: #ffffff;
    color:#34495e;
    letter-spacing: 3px;
    padding: 15px;

}

td.fecha
{
    text-align: right;
    border: solid 0px #34495e;
    background: #ffffff;
    color:#34495e;
    letter-spacing: 3px;
    padding: 18px;

}
/*hojas de estilo propia*/
img{
    width: 100%;
}

/*letras*/
.chico{font-size: 11px;}  .mediano{font-size: 15px;}  .grande{font-size:18px;}
.subrayado{text-decoration: underline;} .firma {font-size: 13px;font-style: italic;}

.ancho{width:20px; };

.bajo{
    display: block;
    margin: 15px 0px 0px 0px;
    background: #ccc;
}
/**/

</style>

<table border="0">
    <col style="width: 100%" class="col1">

    <tr>
        <td>
            <img src="../images/encabezado.jpg" alt="">
        </td>
    </tr>

</table>


<table border="0">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <col style="width: 10%">
    <!-- defino el ancho de la tabla -->
    <tr border="0">
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>

    <tr >
        <td  colspan="10" class="titular2">
            DATOS GENERALES DEL TRABAJADOR
        </td>
    </tr> 

    <tr >
        <td  colspan="10" class="titular">
            Información General
        </td>
    </tr>   

    <tr >
        <td rowspan="4" colspan="2" class="borde">
            <img src="<?php echo $foto; ?>" alt="">
        </td>
        <td  colspan="5" class="borde">
            <strong>Nombre  :</strong> <?php echo $nombre.' '.$paterno.' '.$materno; ?>
        </td>
        <td  colspan="3" class="borde">
            <strong>Edad :</strong> <?php echo $edad; ?>
        </td>
    </tr>   

    <tr >
        <td  colspan="5" class="borde">
            <strong>Correo electrónico :</strong> <?php echo $correo; ?>
        </td>
        <td  colspan="3" class="borde">
            <strong>Sexo :</strong> <?php echo "$sexo"; ?>
        </td>
    </tr> 

    <tr >
        <td  colspan="6" class="borde">
            <strong>Fecha de nacimiento :</strong> <?php echo $nacimiento; ?>
        </td>
        <td  colspan="2" class="borde">
            <strong>Estado civil :</strong> <?php echo $ecivil; ?>
        </td>
    </tr> 

    <tr >
        <td  colspan="10" class="borde">
            <strong>Clave única de registro de población (CURP):</strong> <?php echo $curp; ?>
        </td>
    </tr> 

    <tr >
        <td  colspan="10" class="borde">
            <strong>Domicilio :</strong> <?php echo $domicilio; ?>
        </td>
    </tr> 

    <tr >
        <td  colspan="10" class="">
            <p style="text-align:justify;">Yo <strong><?php echo $nombre.' '.$paterno.' '.$materno; ?></strong>, con clave de empleado <strong><?php echo $clave ?></strong> confirmo entrega de tarjeta de asistencia, por lo que con este acto y con mi firma reconozco y me obligo a lo siguiente:</p>
            <ul>
                <li>Cuidar la tarjeta recibida</li>
                <li>La tarjeta es de uso personal</li>
                <li>Prohibido intercambio de tarjetas</li>
                <li>Evitar cualquier tipo de duplicidad de la misma</li>
                <li>En caso de extravio reportar inmediatamente</li>
            </ul>
        </td>
    </tr> 

    <tr>
        <td  colspan="10" style="text-align:center;">
        <br><br>
        ___________________________________________
        <br><br>
        <strong><?php echo $nombre.' '.$paterno.' '.$materno; ?></strong><br>
        Trabajador
        </td>
    </tr> 

    <tr >
        <td  colspan="10" class="fecha">
            <strong>Fecha de impresión:</strong> <?php echo $fCastellano; ?>
        </td>
    </tr> 

    <tr>
        <td  colspan="10" align="center">
            <hr style="border:.5px dashed">
        </td>
    </tr>

</table>
<br> 
<table border="0" class="tarjeta">
    <col style="width: 5%">
    <col style="width: 5%">
    <col style="width: 5%">
    <col style="width: 5%">
    <col style="width: 5%">
    <col style="width: 5%">
    <col style="width: 5%">
    <col style="width: 5%">
    <col style="width: 5%">
    <col style="width: 5%">
    
    <tr border="0">
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td colspan="10" class="TituloTarjeta"><strong>Tarjeta de Asistencia</strong></td>
    </tr>
    <tr>
        <td rowspan="3" colspan="3" class="borde">
            <img src="<?php echo $foto; ?>" alt="">
        </td>
        <td  colspan="7" class="borde">
            <?php echo $nombre.' '.$paterno.' '.$materno; ?>
        </td>
    </tr>   
    <tr>
        <td  colspan="7" class="borde">
            <?php echo $curp ?>
        </td>
    </tr>
    <tr>
        <td  colspan="7" class="borde">
            <?php echo "Clave de empleado - " .$clave?>
        </td>
    </tr>

    <tr>
        <td  colspan="10" class="borde">
            <barcode dimension="1D" type="CODE39" value="<?php echo $clave?>" class="barras"> </barcode>
        </td>
    </tr>

</table>
<?php
// Conexion mysqli
include'../conexion/conexionli.php';

include'../funciones/calcularEdad.php';
//Variable de Nombre
$varGral="-DP";

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
                sexo,
                id_ecivil
            FROM
                datos ORDER BY id_datos DESC";
$consultar = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
<table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Imprimir</th>
                <th scope="col">Datos</th>
                <th scope="col">Foto</th>
                <th scope="col">Audio</th>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ap. Paterno</th>
                <th scope="col">Ap. Materno</th>
                <th scope="col">Edad</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
        <?php
        // Recorro el arreglo y le asigno variables a cada valor del item
        $n=1;
        while( $row = mysqli_fetch_array($consultar) ) {

            $id          = $row[0];

            if ($row[1] == 1) {
                $chkChecado    = "checked";
                $dtnDesabilita = "";
                $chkValor      = "1";
                $iconSound="fa fa-volume-up fa-lg";
            }else{
                $chkChecado    = "";
                $dtnDesabilita = "disabled";
                $chkValor      = "0";
                $iconSound="fa fa-volume-mute fa-lg";
            }

            $nombre     = $row[2];
            $paterno    = $row[3];
            $materno    = $row[4];
            $fNac       = $row[5];
            $nacimiento = date("d-m-Y", strtotime($row[5]));
            $edad       = CalculaEdad($fNac);
            $correo     = $row[6];
            $curp       = $row[7];
            $clave      = $row[8];
            $domicilio  = $row[9];
            $sexo       = $row[10];
            $ecivil     = $row[11];
            $nCompleto  = $row[2].' '.$row[3].' '.$row[4];
            
            $sonido     ="El nombre completo de la persona es ".$nombre." ".$paterno." ".$materno." , registrado con la clave ".$clave;

            $foto       = '../fotos/'.$clave.'.jpg';

            if (file_exists($foto)){
                $icoFoto="<i class='fas fa-check '></i>";
                $tFoto="Si";
            }else{
                $icoFoto="<i class='fas fa-times fa-lg'></i>";
                $tFoto="No";
            }

            ?>
            <tr class="centrar">
                <th scope="row" class="textoBase">
                    <?php echo $n?>
                </th>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="editar btn btn-outline-success btn-sm activo" id="btnEditar<?php echo $varGral?><?php echo $n?>" onclick="llenar_formulario_DP('<?php echo $id?>','<?php echo $nombre?>','<?php echo $paterno?>','<?php echo $materno?>','<?php echo $fNac?>','<?php echo $edad?>','<?php echo $correo?>','<?php echo $curp?>','<?php echo $clave?>','<?php echo $domicilio?>','<?php echo $sexo?>','<?php echo $ecivil?>')">
                                <i class="far fa-edit fa-lg"></i>
                    </button>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="imprimir btn btn-outline-warning btn-sm activo" id="btnImprimir<?php echo $varGral?><?php echo $n?>" onclick="abrirModalPDF('<?php echo $id?>','../mDatosPersonales','Datos Personales')">
                                <i class="fas fa-print fa-lg"></i>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="ventana btn btn-outline-info btn-sm activo"  id="btnModal<?php echo $varGral?><?php echo $n?>" onclick="abrirModalDatos_DP('<?php echo $id?>','<?php echo $nombre?>','<?php echo $paterno?>','<?php echo $materno?>','<?php echo $fNac?>','<?php echo $edad?>','<?php echo $correo?>','<?php echo $curp?>','<?php echo $clave?>','<?php echo $domicilio?>','<?php echo $sexo?>','<?php echo $ecivil?>')">
                        <i class="far fa-window-maximize fa-lg"></i>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="foto btn btn-outline-secondary btn-sm activo"  id="btnFoto<?php echo $varGral?><?php echo $n?>" onclick="abrirModalFoto('<?php echo $id?>','<?php echo $clave?>','<?php echo $nCompleto?>','<?php echo $tFoto?>')">
                        <?php echo $icoFoto?>
                    </button>
                </td>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="audio btn btn-link btn-sm activo"  id="btnSonido<?php echo $varGral?><?php echo $n?>" onclick="hablar('<?php echo $sonido?>')">
                    <i id="icoSound<?php echo $varGral?><?php echo $n?>" class="<?php echo $iconSound?>"></i>
                    </button>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $clave?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $nombre?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $paterno?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $materno?>
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <?php echo $edad?>
                    </label>
                </td>
                <td>
                    <input value="<?php echo $chkValor?>" onchange="cambiar_estatus_DP(<?php echo $id?>,<?php echo $n?>)" class="toggle-two" type="checkbox" <?php echo $chkChecado?> data-toggle="toggle" data-onstyle="outline-success" data-width="60" data-size="sm" data-offstyle="outline-danger" data-on="<i class='fa fa-check'></i> Si" data-off="<i class='fa fa-times'></i> No" id="check<?php echo $n?>">
                </td>
            </tr>
        <?php
        $n++;
        }
        ?>

        </tbody>
        <tfoot>
            <tr class='hTabla'>
            <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Imprimir</th>
                <th scope="col">Datos</th>
                <th scope="col">Foto</th>
                <th scope="col">Audio</th>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ap. Paterno</th>
                <th scope="col">Ap. Materno</th>
                <th scope="col">Edad</th>
                <th scope="col">Status</th>
            </tr>
        </tfoot>
    </table>
<div>

<?php
//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexionLi
mysqli_close($conexionLi);
?>

<script type="text/javascript">
  var varGral='<?php echo $varGral?>';
  $(document).ready(function() {
        $('#example'+varGral).DataTable( {
            "language": {
                    // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    "url": "../plugins/dataTablesB4/langauge/Spanish.json"
                },
            "order": [[ 0, "asc" ]],
            "paging":   true,
            "ordering": true,
            "info":     true,
            "responsive": true,
            "searching": true,
            stateSave: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
            ],
            columnDefs: [ {
                // targets: 0,
                // visible: false
            }],
            buttons: [
                      {
                          text: "<i class='fas fa-plus fa-lg' aria-hidden='true'></i> &nbsp;Nuevo Registro",
                          className: 'btn btn-outline-primary btnEspacio',
                          id: 'btnNuevo',
                          action : function(){
                            nuevo_registro_DP();
                          }
                      },
                      {
                          extend: 'excel',
                          text: "<i class='far fa-file-excel fa-lg' aria-hidden='true'></i> &nbsp;Exportar a Excel",
                          className: 'btn btn-outline-secondary btnEspacio',
                          title:'Lista_datos_personales',
                          id: 'btnExportar',
                          exportOptions: {
                            columns:  [6,7,8,9,10],
                          }
                      }

            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
</script>
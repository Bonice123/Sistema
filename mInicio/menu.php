<?php

$cadenaMenu = "SELECT
                    id_tema,
                    nombre_tema
                FROM
                    temas
                WHERE
                    activo = 1
                ORDER BY nombre_tema";
                $consultarMenu = mysqli_query($conexionLi, $cadenaMenu);
//$row = mysqli_fetch_array($consultar);

?>
<div class="sidebar-header">
    <h3 class="centrar"><i class="fas fa-award"></i> Sistema </h3>
</div>

<ul class="list-unstyled components">
    <p class="centrar" id="txtMnuOp"><i class="fas fa-bars"></i> Menú de Opciones </p>
    <li class="menu active activado" id="liActividades">
        <a href="javascript:verAsistencias()"><i class="fas fa-check"></i> Registro de Asistencia</a>
    </li>
    <li class="menu" id="liDatos">
        <a href="javascript:verDatosPersonales()"><i class="fas fa-user-check"></i> Datos Personales</a>
    </li>
    <li class="menu" id="liEcivil">
        <a href="javascript:verEstadoCivil()"><i class="fas fa-compass"></i> Estado Civil</a>
    </li>
    <li class="menu" id="liUsuarios">
        <a href="#"><i class="fas fa-users"></i> Usuarios</a>
    </li>
    <li class="menu" id="liTemas">
        <a href="#"><i class="fas fa-paint-brush"></i> Crear Temas</a>
    </li>
    <li class="active activado" id="liContras">
        <a href="#"><i class="fas fa-key"></i> Cambiar Contraseña</a>
    </li>
    <li class="active activado">
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="mnuColapsado"><i class="fas fa-tint"></i> Temas</a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
        <?php
            // Recorro el arreglo y le asigno variables a cada valor del item
            $n=1;
            while( $rowMenu = mysqli_fetch_array($consultarMenu) ) {
            ?>
            <li>
                <a href="javascript:aplicarTema(<?php echo $rowMenu[0]?>,'enlace')" class="enlace"><i class="fas fa-angle-right"></i> <?php echo $rowMenu[1]?></a>
            </li>
            <?php } ?>
        </ul>
    </li>
</ul>

<ul class="list-unstyled CTAs">
    <li>
        <a href="javascript:salir()" class="article"><i class="fas fa-power-off"></i> Cerrar Sistema</a>
    </li>
</ul>

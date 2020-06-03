<?php
//Variable de Nombre
$varGral="-EC";
?>
<form id="frmActualizar<?php echo $varGral?>">

<input type="hidden"  id="eIdFC">

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="eDesc">Descripcion:</label>
                <input type="search" id="eDesc" class="form-control">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col text-left">
                    <button  type="button" class="btn btn-outline-danger  activo btnEspacio" id="btnCancelarA<?php echo $varGral?>">
                        <i class='fa fa-ban fa-lg'></i>
                        Cancelar
                    </button>
                </div>
                <div class="col text-right">
                    <button  type="submit" class="btn btn-outline-success  activo btnEspacio" id="btnActualizar<?php echo $varGral?>">
                        <i class='fa fa-bolt fa-lg'></i>
                        Actualizar Información
                    </button>
                </div>
            </div>
        </div>

    </div>

</form>
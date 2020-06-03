<?php
//Variable de Nombre
$varGral="-EC";
?>
<form id="frmGuardar<?php echo $varGral?>">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="desc">Descripción:</label>
                <input type="search" class="form-control" id="desc"   autofocus required >
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col text-left">
                    <button  type="button" class="btn btn-outline-danger  activo btnEspacio" id="btnCancelarG<?php echo $varGral?>">
                        <i class='fa fa-ban fa-lg'></i>
                        Cancelar
                    </button>
                </div>

                <div class="col text-right">
                    <button  type="submit" class="btn btn-outline-primary  activo btnEspacio" id="btnGuardar<?php echo $varGral?>">
                        <i class='fa fa-save fa-lg'></i>
                        Guardar Información
                    </button>
                </div>
            </div>
        </div>

    </div>

</form>
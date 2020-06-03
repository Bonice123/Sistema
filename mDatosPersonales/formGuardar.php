<?php
//Variable de Nombre
$varGral="-DP";
?>
<form id="frmGuardar<?php echo $varGral?>">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
            <div class="form-group">
                <label for="clave">clave:</label>
                <input type="number" class="form-control " id="clave"  maxlength="3" autofocus required >
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-4">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control " id="nombre" autofocus required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="apPaterno">Apellido Paterno:</label>
                <input type="text" class="form-control activo" id="apPaterno" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="apMaterno">Apellido Materno:</label>
                <input type="text" class="form-control activo" id="apMaterno" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="fNac">Nacimiento:</label>
                <input type="date" class="form-control activo" id="fNac" required value="<?php echo $fecha ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" class="form-control activo" id="edad" readonly value=0>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="text" class="form-control activo" id="correo" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="curp">Curp:</label>
                <input type="text" class="form-control activo" id="curp" required  maxlength="18">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group">
                <label for="domicilio">Domicilio:</label>
                <input type="text" class="form-control activo" id="domicilio" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" class="select2" style="width: 100%" >
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="ecivil">Estado Civil:</label>
                <select id="ecivil" class="select2" style="width: 100%" >

                </select>
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
<?php
//Variable de Nombre
$varGral="-DP";
?>
<form id="frmActualizar<?php echo $varGral?>">

<input type="hidden"  id="eId">

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
            <div class="form-group">
                <label for="eClave">clave:</label>
                <input type="number" class="form-control " id="eClave" autofocus required maxlength="3" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-4">
            <div class="form-group">
                <label for="eNombre">Nombre:</label>
                <input type="text" class="form-control " id="eNombre" autofocus required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="eApPaterno">Apellido Paterno:</label>
                <input type="text" class="form-control activo" id="eApPaterno" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="eApMaterno">Apellido Materno:</label>
                <input type="text" class="form-control activo" id="eApMaterno" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="eFnac">Nacimiento:</label>
                <input type="date" class="form-control activo" id="eFnac" required value="<?php echo $fecha ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
            <div class="form-group">
                <label for="eEdad">Edad:</label>
                <input type="text" class="form-control activo" id="eEdad" readonly value=0>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="eCorreo">Correo:</label>
                <input type="text" class="form-control activo" id="eCorreo" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="eCurp">Curp:</label>
                <input type="text" class="form-control activo" id="eCurp" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group">
                <label for="eDomicilio">Domicilio:</label>
                <input type="text" class="form-control activo" id="eDomicilio" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="eSexo">Sexo:</label>
                <select id="eSexo" class="select2" style="width: 100%" >
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="eEcivil">Estado Civil:</label>
                <select id="eEcivil" class="select2" style="width: 100%" >

                </select>
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
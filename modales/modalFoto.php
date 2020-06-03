<!-- Modal -->
<div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="modalDatosCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="txtTitularFoto">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="#" method="post" id="formSubida">
          
            <input id="image" type="file"  class="file"  data-theme="fas">
           
            <input type="hidden" class="form-control-file" name="clavePersona" id="clavePersona" >
            <input type="hidden" class="form-control-file" name="tamanoKB" id="tamanoKB" value="3000">
            <div class="col text-center">
              <button type="button" onclick="subirFoto();" class="btn btn-primary" style="margin-top:8px;">
              <i class="fas fa-check"></i> Subir Foto
              </button>
            </div>
          </form>

          <form action="#" method="post" id="formVista">
            <div class="col text-center">
              <img id="imgFoto" class="img-fluid img-thumbnail" src="" animated  flipInX>
            </div>
            <div class="col text-center">
              <button type="button" onclick="eliminarFoto();" class="btn btn-danger" style="margin-top:8px;">
              <i class="fas fa-times"></i> Eliminar Archivo
              </button>
            </div>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
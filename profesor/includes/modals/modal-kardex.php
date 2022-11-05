<div class="modal fade" id="modalKardex" tabindex="-1" role="dialog" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Cargar Nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formKardex" name="formKardex">
   
            <input type="hidden" name="idap" id="idap" value="<?= $ap;?>">
            <input type="hidden" name="alumno" id="alumno" value="<?= $alumno;?>">
            <input type="hidden" name="idka" id="idka" value="">
          <div class="form-group">
            <label for="control-label" >Observacion:</label>
            <input type="text" class="form-control" name="observacion" id="observacion">
            <label for="control-label" >Fecha:</label>
            <input type="date" class="form-control" name="fecha" id="fecha">
          </div>
   
         

          <div class="form-group">
            <label for="control-label" >Nota</label>
         <p>Los cambios no podran ser editados</p>
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id = 'action' class="btn btn-primary"  >Guardar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalCitacion" tabindex="-1" role="dialog" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Cargar Nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCitacion" name="formCitacion">
   
            <input type="hidden" name="idpm" id="idpm" value="<?= $curso;?>">
            <input type="hidden" name="idcitacion" id="idcitacion" value="">
          <div class="form-group">
            <label for="control-label" >Detalle:</label>
            <textarea name="detalle" class="form-control" id="detalle"  rows="4"></textarea>
            <label for="control-label" >Fecha:</label>
            <input type="date" class="form-control" name="fecha" id="fecha">
          </div>
   
         

          <div class="form-group">
            <label for="control-label" >Citacion</label>
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
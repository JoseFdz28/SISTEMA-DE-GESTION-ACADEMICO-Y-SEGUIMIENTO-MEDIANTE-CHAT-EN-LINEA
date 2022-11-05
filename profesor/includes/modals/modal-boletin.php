<div class="modal fade" id="modalBoletin" tabindex="-1" role="dialog" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Cargar Nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formBoletin" name="formBoletin">

            <input type="hidden" name="idbo" id="idbo" value="<?= $idboletin;?>">
          <div class="form-group">
            <label for="control-label" >Primer Trimestre:</label>
            <input type="number" class="form-control" name="nota1" id="nota1">
            <label for="control-label" >Segundo Trimestre:</label>
            <input type="number" class="form-control" name="nota2" id="nota2">
            <label for="control-label" >Tercer Trimestre:</label>
            <input type="number" class="form-control" name="nota3" id="nota3">
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
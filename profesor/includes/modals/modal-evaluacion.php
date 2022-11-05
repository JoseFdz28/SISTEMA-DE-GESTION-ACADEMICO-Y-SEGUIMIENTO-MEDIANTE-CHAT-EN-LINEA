<div class="modal fade" id="modalEvaluacion" tabindex="-1" role="dialog" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Nueva Evalucion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEvaluacion" name="formEvaluacion">
            <input type="hidden" name="idevaluacion" id="idevaluacion" value="">
            <input type="hidden" name="idcontenido" id="idcontenido" value="<?= $contenido;?>">
          <div class="form-group">
            <label for="control-label" >Titulo de la Evaluacion:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
   
          <div class="form-group">
            <label for="control-label" >Descripcion del Contenido:</label>
            <textarea name="descripcion" class="form-control" id="descripcion"  rows="4"></textarea>
          </div>

          <div class="form-group">
            <label for="control-label" >Fecha Limite:</label>
            <input type="date" class="form-control" name="fecha" id="fecha">
          </div>

          <div class="form-group">
            <label for="control-label" >Valor de la evaluacion:</label>
            <input type="text" class="form-control" name="valor" id="valor">
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
<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="receptionModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-info-sign"></i> Recepción de equipo</h4>
      </div>
      <div class="modal-body" style="max-height:450px; overflow:auto;">
		<div id="add-reception-messages"></div>
        <div class="form-group">
	        	<label for="quantity_reception" class="col-sm-3 control-label">Cantidad recibida: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="quantity_reception" placeholder="Cantidad recibida" name="quantity_reception" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
      </div>
      <div class="modal-footer receptionNotificationrFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancelar</button>
        <button type="button" class="btn btn-primary" id="receptionProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
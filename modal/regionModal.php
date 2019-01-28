<!-- add product -->
<div class="modal fade" id="addRegionModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitRegionForm" action="php_action/createRegion.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar región</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-region-messages"></div>     	           	       

	        <div class="form-group">
	        	<label for="regions_name" class="col-sm-3 control-label">Nombre: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="regions_name" placeholder="Nombre de la región" name="regions_name" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="regions_zone" class="col-sm-3 control-label">Zona: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="regions_zone" placeholder="Zona" name="regions_zone" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 				        	         	       

	        <div class="form-group">
	        	<label for="regions_status" class="col-sm-3 control-label">Estado: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="regions_status" name="regions_status">
				      	<option value="">-- Selecciona --</option>
				      	<option value="1">Disponible</option>
				      	<option value="2">No disponible</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createRegionBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editRegionModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar región</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
	      	</div>

	      	<div class="div-result">
				  
				  <!-- Tab panes -->
				  <div class="tab-content">

				    <!-- product image -->
				    
				    	<form class="form-horizontal" id="editRegionForm" action="php_action/editRegion.php" method="POST">				    
				    	<br />

				    	<div id="edit-region-messages"></div>

				    	<div class="form-group">
			        	<label for="editRegionName" class="col-sm-3 control-label">Nombre: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editRegionName" placeholder="Nombre de la región" name="editRegionName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

			        <div class="form-group">
			        	<label for="editRegionZone" class="col-sm-3 control-label">Zona: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editRegionZone" placeholder="Zona" name="editRegionZone" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	        	 					        	         	       

			        <div class="form-group">
			        	<label for="editRegionStatus" class="col-sm-3 control-label">Estado: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editRegionStatus" name="editRegionStatus">
						      	<option value="">-- Selecciona -- </option>
						      	<option value="1">Disponible</option>
						      	<option value="2">No disponible</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	         	        

			        <div class="modal-footer editRegionFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
				        
				        <button type="submit" class="btn btn-success" id="editRegionBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				       
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeRegionModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar región</h4>
      </div>
      <div class="modal-body">

      	<div class="removeRegionMessages"></div>

        <p>Realmente deseas eliminar la región?</p>
      </div>
      <div class="modal-footer removeRegionFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancelar</button>
        <button type="button" class="btn btn-primary" id="removeRegionBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
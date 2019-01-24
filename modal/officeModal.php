<!-- add product -->
<div class="modal fade" id="addOfficeModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitOfficeForm" action="php_action/createOffice.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar oficina</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-office-messages"></div>	     	           	       

			<div class="form-group">
	        	<label for="officeCode" class="col-sm-3 control-label">Código de oficina: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="officeCode" placeholder="Código de la oficina" name="officeCode" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="officeName" class="col-sm-3 control-label">Nombre: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="officeName" placeholder="Nombre de la oficina" name="officeName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="officeType" class="col-sm-3 control-label">Tipo de oficina: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="officeType" name="officeType">
				      	<option value="">-- Selecciona --</option>
				      	<option value="1">Administrativa</option>
				      	<option value="2">Almacen</option>
				      	<option value="3">Tienda</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	  	        

	        <div class="form-group">
	        	<label for="officeRegion" class="col-sm-3 control-label">Región: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="officeRegion" name="officeRegion">
				      	<option value="">-- Selecciona --</option>
				      	<?php 
				      	$sql = "SELECT regions_id, regions_name, regions_status FROM regions WHERE regions_status = 1 AND regions_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	        	         	       
         
         	<div class="form-group">
	        	<label for="officeStatus" class="col-sm-3 control-label">Estado: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="officeStatus" name="officeStatus">
				      	<option value="">-- Selecciona --</option>
				      	<option value="1">Disponible</option>
				      	<option value="2">No disponible</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createOfficeBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->

<!-- edit categories brand -->
<div class="modal fade" id="editOfficeModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar oficina</h4>
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
				    
				    	<form class="form-horizontal" id="editOfficeForm" action="php_action/editOffice.php" method="POST">				    
				    	<br />

				    	<div id="edit-office-messages"></div>

			    		<div class="form-group">
				        	<label for="editOfficeCode" class="col-sm-3 control-label">Código: </label>
				        	<label class="col-sm-1 control-label">: </label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="editOfficeCode" placeholder="Código" name="editOfficeCode" autocomplete="off">
							    </div>
			        	</div> <!-- /form-group-->	

				    	<div class="form-group">
				        	<label for="editOfficeName" class="col-sm-3 control-label">Nombre: </label>
				        	<label class="col-sm-1 control-label">: </label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="editOfficeName" placeholder="Nombre de la oficina" name="editOfficeName" autocomplete="off">
							    </div>
			        	</div> <!-- /form-group-->	    

				        
	        <div class="form-group">
	        	<label for="officeType" class="col-sm-3 control-label">Tipo de oficina: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="officeType" name="officeType">
				      	<option value="">-- Selecciona --</option>
				      	<option value="1">Administrativa</option>
				      	<option value="2">Almacen</option>
				      	<option value="2">Tienda</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	  	        

	        <div class="form-group">
	        	<label for="officeRegion" class="col-sm-3 control-label">Región: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="officeRegion" name="officeRegion">
				      	<option value="">-- Selecciona --</option>
				      	<?php 
				      	$sql = "SELECT regions_id, regions_name, regions_status FROM regions WHERE regions_status = 1 AND regions_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->      	 					        	         	       

			        <div class="form-group">
			        	<label for="editOfficeStatus" class="col-sm-3 control-label">Estado: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editOfficeStatus" name="editOfficeStatus">
						      	<option value="">-- Selecciona -- </option>
						      	<option value="1">Disponible</option>
						      	<option value="2">No disponible</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	         	        

			        <div class="modal-footer editOfficeFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
				        
				        <button type="submit" class="btn btn-success" id="editOfficeBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeOfficeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar oficina</h4>
      </div>
      <div class="modal-body">

      	<div class="removeOfficeMessages"></div>

        <p>Realmente deseas eliminar la oficina?</p>
      </div>
      <div class="modal-footer removeOfficeFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancelar</button>
        <button type="button" class="btn btn-primary" id="removeOfficeBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
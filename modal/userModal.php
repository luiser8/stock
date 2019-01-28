<!-- add product -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitUserForm" action="php_action/createUser.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar usuario</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-region-messages"></div>     	           	       

	        <div class="form-group">
	        	<label for="username" class="col-sm-3 control-label">Nombre de usuario: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="username" placeholder="Nombre de usuario" name="username" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

			<div class="form-group">
	        	<label for="password" class="col-sm-3 control-label">Contraseña: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     

	        <div class="form-group">
	        	<label for="email" class="col-sm-3 control-label">Correo: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email" placeholder="Correo" name="email" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 				        	         	       

	        <div class="form-group">
	        	<label for="level_id" class="col-sm-3 control-label">Nivel: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="level_id" name="level_id">
				      	<option value="">-- Selecciona --</option>
				      	<?php 
				      	$sql = "SELECT level_id, level_name FROM levels";
								$result = $connect->query($sql);
								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->  

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
	        
	        <button type="submit" class="btn btn-primary" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar usuario</h4>
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
				    
				    	<form class="form-horizontal" id="editUserForm" action="php_action/editUser.php" method="POST">				    
				    	<br />

				    	<div id="edit-user-messages"></div>

				    	<div class="form-group">
			        	<label for="editUserName" class="col-sm-3 control-label">Nombre de usuario: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editUserName" placeholder="Nombre de usuario" name="editUserName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

					<div class="form-group">
			        	<label for="editPassword" class="col-sm-3 control-label">Contraseña: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="password" class="form-control" id="editPassword" placeholder="Contraseña" name="editPassword" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editUserEmail" class="col-sm-3 control-label">Correo: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="email" class="form-control" id="editUserEmail" placeholder="Correo" name="editUserEmail" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	        	 					        	         	       
         	        <div class="form-group">
			        <label for="editLevel_id" class="col-sm-3 control-label">Nivel: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editLevel_id" name="editLevel_id">
						      	<option value="">-- Selecciona --</option>
						      	<?php 
						      	$sql = "SELECT level_id, level_name FROM levels";
										$result = $connect->query($sql);
										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->  

			        <div class="modal-footer editUserFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cerrar</button>
				        
				        <button type="submit" class="btn btn-success" id="editUserBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Guardar cambios</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar usuario</h4>
      </div>
      <div class="modal-body">

      	<div class="removeUserMessages"></div>

        <p>Realmente deseas eliminar el usuario?</p>
      </div>
      <div class="modal-footer removeUserFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Cancelar</button>
        <button type="button" class="btn btn-primary" id="removeUserBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
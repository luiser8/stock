<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>	Reportes
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				<div class="col-md-6">Por fecha
				<form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getOrderReportForm">
				  <input type="hidden" name="tipo" value="1">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Fecha inicial</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Fecha inicial" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">Fecha final</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="Fecha final" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generar Reporte</button>
				    </div>
				  </div>
				</form>
				</div>

				<div class="col-md-6">Por sucursal
				<form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getOrderReportForm">
				 <input type="hidden" name="tipo" value="2">
				 <div class="form-group">
	        	<label for="sucursal" class="col-sm-3 control-label">Sucursal</label>
				    <div class="col-sm-8">
				      <select class="form-control" id="sucursal" name="sucursal">
				      	<option value=""> Selecciona</option>
				      	<?php 
				      	$sql = "SELECT offices_id, offices_name FROM offices";
								$result = $connect->query($sql);
								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->  
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generar Reporte</button>
				    </div>
				  </div>
				</form>
				</div>
			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->

<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>
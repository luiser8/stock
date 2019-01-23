<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'modal/regionModal.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Inicio</a></li>		  
		  <li class="active">Regiones</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Listado de regiones</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addRegionModalBtn" data-target="#addRegionModal"> <i class="glyphicon glyphicon-plus-sign"></i> Agregar región </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageRegionTable">
					<thead>
						<tr>						
							<th>Nombre de la región</th>
							<th>Zona</th>							
							<th>Estado</th>							
							<th style="width:15%;">Opciones</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script src="custom/js/region.js"></script>

<?php require_once 'includes/footer.php'; ?>
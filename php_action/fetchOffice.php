<?php 	

require_once 'core.php';

$sql = "SELECT offices.offices_id, offices.offices_code, offices.offices_name, offices.regions_id,
 		offices.offices_type, offices.offices_active, offices.offices_status, regions.regions_name
 			FROM offices 
		INNER JOIN regions ON offices.regions_id = regions.regions_id  
		WHERE offices.offices_active = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 
 $type = "";

 while($row = $result->fetch_array()) {
 	$officeId = $row[0];
 	// active 
 	if($row[6] == 1) {
 		// activate member
 		$active = "<label class='label label-success'>Disponible</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>No disponible</label>";
 	} // /else

 	if($row[4] == 1) {
 		// activate member
 		$type = "Administrativa";
 	} elseif($row[4] == 2) {
 		// deactivate member
 		$type = "Almacen";
 	} elseif($row[4] == 3){
 		$type = "Tienda";
 	} 
 	// /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editOfficeModalBtn" data-target="#editOfficeModal" onclick="editOffice('.$officeId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeOfficeModal" id="removeOfficeModalBtn" onclick="removeOffice('.$officeId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }

 	$output['data'][] = array( 		
 		$row[1],  		
 		$row[2], 
 		$type,
 		$row[7],		
 		$active,
 		$button 	
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);
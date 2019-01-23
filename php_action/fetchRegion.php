<?php 	

require_once 'core.php';

$sql = "SELECT regions_id, regions_name, regions_zone, regions_active, regions_status FROM regions 
		WHERE regions_status = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$regionId = $row[0];
 	// active 
 	if($row[4] == 1) {
 		// activate member
 		$active = "<label class='label label-success'>Disponible</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>No disponible</label>";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editRegionModalBtn" data-target="#editRegionModal" onclick="editRegion('.$regionId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeRegionModal" id="removeRegionModalBtn" onclick="removeRegion('.$regionId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }

	$regions_name = $row[1];
	$regions_zone = $row[2];

 	$output['data'][] = array( 	
 		//$regionId,	
 		$regions_name, 
 		$regions_zone,
 		$active,
 		$button 
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);
<?php 	

require_once 'core.php';

$sql = "SELECT * FROM users";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();

 while($row = $result->fetch_array()) {
 	$userId = $row[0];
 	if($row[1] == 1) {
 		// activate member
 		$type = "Administrador";
 	} elseif($row[1] == 2) {
 		// deactivate member
 		$type = "Operador";
 	} elseif($row[1] == 3){
 		$type = "Supervisor";
 	} 

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editUserModal" onclick="editUser('.$userId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" onclick="removeUser('.$userId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$type,
 		$row[2],
 		$row[4],
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
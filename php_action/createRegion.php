<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$regionName = $_POST['regions_name'];
  	$regionZone = $_POST['regions_zone']; 
  	$regionStatus = $_POST['regions_status']; 

	$sql = "INSERT INTO regions (regions_id, regions_name, regions_zone, regions_active, regions_status) VALUES (NULL, '{$regionName}', '{$regionZone}', '{$regionStatus}', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Creado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
	}
	 

	$connect->close();

	echo json_encode($valid);
 	var_dump($_POST);
} // /if $_POST
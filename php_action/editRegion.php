<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$regionName = $_POST['editRegionName'];
	$regionZone = $_POST['editRegionZone'];
  $regionStatus = $_POST['editRegionStatus']; 
  $regionId = $_POST['regionId'];

	$sql = "UPDATE regions SET regions_name = '$regionName', regions_zone = '$regionZone' ,regions_active = '$regionStatus' WHERE regions_id = '$regionId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 	header('Location: ../regions.php');
} // /if $_POST
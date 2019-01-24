<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$officeCode = $_POST['officeCode'];
	$officeName = $_POST['officeName'];
	$officeType = $_POST['officeType'];
	$officeRegion = $_POST['officeRegion'];
 	$officeStatus = $_POST['officeStatus']; 

	$sql = "INSERT INTO offices (offices_id, regions_id, offices_code, offices_name, offices_type, offices_active) VALUES (NULL, '{$officeRegion}', '{$officeCode}', '{$officeName}', '{$officeType}', '{$officeStatus}')";

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
<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$officeId = $_POST['officeId'];
	$officeCode = $_POST['officeCode'];
	$officeName = $_POST['officeName'];
	$officeType = $_POST['officeType'];
	$officeRegion = $_POST['officeRegion'];
 	$officeStatus = $_POST['officeStatus']; 

	$sql = "UPDATE offices SET offices_code = '$officeCode', offices_name = '$officeName',
					offices_type = '$officeType', offices_region = '$officeRegion',
					offices_status = '$officeStatus'

					WHERE offices_id = '$officeId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 	header('Location: ../offices.php');
} // /if $_POST
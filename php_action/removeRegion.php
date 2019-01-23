<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$regionId = $_POST['regionId'];

if($regionId) { 

 $sql = "UPDATE regions SET regions_status = 2 WHERE regions_id = {$regionId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Eliminado exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido eliminar";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST
<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$officeId = $_POST['officeId'];

if($officeId) { 

 $sql = "UPDATE offices SET offices_status = 2 WHERE offices_id = {$officeId}";

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
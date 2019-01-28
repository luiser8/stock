<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$userId = $_POST['user_id'];

if($userId) { 

 $sql = "DELETE FROM users WHERE user_id = {$userId}";

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
<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$user_id = $_SESSION['userId'];
	$notifications_body = $_POST['notifications_body'];
 	$administrador = $_POST['administrador']; 

	$sql = "INSERT INTO notifications(notifications_id, user_id, notifications_admin, notifications_body) VALUES (NULL, '{$user_id}', '{$administrador}', '{$notifications_body}')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Creado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido guardar";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
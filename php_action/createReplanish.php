<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$user_id = $_SESSION['userId'];
	$notifications_body = $_POST['notifications_body'];
 	$administrador = $_POST['administrador']; 
 	
	$sql = "INSERT INTO notifications(notifications_id, user_id, notifications_admin, notifications_body) VALUES (NULL, '{$user_id}', '{$administrador}', '{$notifications_body}')";
	
	$sql = "SELECT email FROM users WHERE user_id =".$administrador;
								$result = $connect->query($sql);
								
								while($row = $result->fetch_array()) {
									$to_email = $row[0];
								} // while

	$subject = 'Notificacion de renovacion de stock.';
	$message = 'Mensaje: ' .$notifications_body . ' De: ' .$_SESSION['email'];
	$headers = 'From: noreply@stock.com';
	var_dump($to_email);
	
	mail($to_email,$subject,$message,$headers);

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

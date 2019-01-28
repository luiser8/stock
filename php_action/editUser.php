<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$userId = $_POST['user_id'];
	$userName = $_POST['editUserName'];
  $password = md5($_POST['editPassword']); 
  $email = $_POST['editUserEmail']; 
  $level_id = $_POST['editLevel_id']; 

	$sql = "UPDATE users SET level_id = '$level_id', username = '$userName',
				password = '$password', email = '$email'
			WHERE user_id = '$userId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Actualizado exitosamente";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error no se ha podido actualizar";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
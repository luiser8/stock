<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$userName = $_POST['user_name'];
  $password = md5($_POST['password']); 
  $email = $_POST['email']; 
  $level_id = $_POST['level_id']; 
  $region_id = $_POST['regions_id']; 

	$sql = "INSERT INTO users (user_id, level_id, regions_id, username, password, email) VALUES (NULL, '{$level_id}', '{$region_id}', '{$userName}', '{$password}', '{$email}')";

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
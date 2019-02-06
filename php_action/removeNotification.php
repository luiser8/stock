<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$notificationId = $_POST['notificationId'];

if($notificationId) { 

 $sql = "UPDATE notifications SET notifications_status = 2 WHERE notifications_id = {$notificationId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST
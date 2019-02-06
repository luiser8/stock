<?php 	

require_once 'core.php';

$sql = "SELECT notifications.notifications_id, users.username, notifications.notifications_body, notifications.created
			FROM notifications
				INNER JOIN users ON notifications.user_id = users.user_id
			WHERE notifications.notifications_status = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();

 while($row = $result->fetch_array()) {

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Acción <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#validateNotificationModal" onclick="validateNotification('.$row[0].')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
		$row[1],
		$row[2],
		$row[3],
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
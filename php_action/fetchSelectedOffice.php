<?php 	

require_once 'core.php';

$officeId = $_POST['officeId'];

$sql = "SELECT * 
			FROM offices WHERE offices_id = $officeId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
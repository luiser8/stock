<?php 	

require_once 'core.php';

$regionId = $_POST['regionId'];

$sql = "SELECT regions_id, regions_name, regions_zone, regions_active, regions_status FROM regions WHERE regions_id = $regionId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
<?php 

require_once 'core.php';

if($_POST) {

	$tipo = $_POST['tipo']; //1 = por fecha, 2 por sucursal
	$sucursal = isset($_POST['sucursal']) ? $_POST['sucursal'] : '';
	$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : date('m/d/Y');
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");

	$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : date('m/d/Y');
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	if($tipo == 1){
	$sql = "SELECT * FROM orders WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Fecha</th>
			<th>Cliente </th>
			<th>Teléfono</th>
			<th>Total</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['client_contact'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
			</tr>';	
			$totalAmount += $result['grand_total'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	

	echo $table;
	}if($tipo == 2){
		$sql = "SELECT orders.*, offices.* FROM orders
				INNER JOIN offices ON orders.offices_id = offices.offices_id 
				WHERE orders.offices_id = '$sucursal' and orders.order_status = 1";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Fecha</th>
			<th>Sucursal</th>
			<th>Cliente </th>
			<th>Teléfono</th>
			<th>Total</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['offices_name'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['client_contact'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
			</tr>';	
			$totalAmount += $result['grand_total'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	

	echo $table;
	}
}

?>
<?php 
	require('sql_connect.php');
	if(isset($_POST["appointment_id"])){
		$appointment_id = $_POST["appointment_id"];
		$sql = "SELECT * FROM appointment WHERE appointment_id=".$appointment_id;
		$result = mysqli_query($conn,$sql);
		$row = $result->fetch_array();
	    echo json_encode($row);
	}
 ?>
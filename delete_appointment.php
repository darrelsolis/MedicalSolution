<?php 
	require('sql_connect.php');

	$appointment_id = $_POST['appointment_id'];

	$sql = "DELETE FROM appointment WHERE appointment_id=".$appointment_id;
	$result = mysqli_query($conn, $sql);

	if($result){
		echo 1;
	}	
 ?>
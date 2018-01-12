<?php 
	require('sql_connect.php');

	$checkup_id = $_POST['checkup_id'];

	$sql_presc = "DELETE FROM prescription WHERE visit_id=".$checkup_id;
	$result_presc = mysqli_query($conn, $sql_presc);

	$sql_checkup = "DELETE FROM checkup WHERE checkup_id=".$checkup_id;
	$result_checkup = mysqli_query($conn, $sql_checkup);

	$sql_visit = "DELETE FROM visit WHERE visit_id=".$checkup_id;
	$result_visit = mysqli_query($conn, $sql_visit);

	if($result_presc && $result_checkup && $result_visit){
		echo 1;
	}else{
		echo 2;
	}
	
 ?>
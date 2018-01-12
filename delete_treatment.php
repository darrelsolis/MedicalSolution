<?php 
	require('sql_connect.php');

	$treatment_id = $_POST['treatment_id'];

	$sql_presc = "DELETE FROM prescription WHERE visit_id=".$treatment_id;
	$result_presc = mysqli_query($conn, $sql_presc);

	$sql_treatment = "DELETE FROM treatment WHERE treatment_id=".$treatment_id;
	$result_treatment = mysqli_query($conn, $sql_treatment);

	$sql_visit = "DELETE FROM visit WHERE visit_id=".$treatment_id;
	$result_visit = mysqli_query($conn, $sql_visit);

	if($result_presc && $result_treatment && $result_visit){
		echo 1;
	}else{
		echo 2;
	}
	
 ?>
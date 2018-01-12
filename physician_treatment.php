<?php 
require('sql_connect.php');
require('date.php');

if(!empty($_POST)){
		//Personal Info
	$physician_id = mysqli_real_escape_string($conn, $_POST['physician_id']);
	$patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
	$diagnosis = mysqli_real_escape_string($conn, $_POST['diagnosis']);
	$treatment = mysqli_real_escape_string($conn, $_POST['treatment']);
	$medicine_id = mysqli_real_escape_string($conn, $_POST['medicine_id']);
	
	if($medicine_id != ''){
		$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
		$dosage = mysqli_real_escape_string($conn, $_POST['dosage']);
	}
	
	$visit_type = "Treatment";
	$date = date("Y-m-d");
	$time = date("H:i:s");


	if($medicine_id != ''){
		// $sql_visit = "INSERT INTO visit VALUES(NULL,'$patient_id','$physician_id','$medicine_id','$date','$time','$visit_type')";
		$sql_visit = "INSERT INTO visit VALUES(NULL,'$patient_id','$physician_id','$date','$time','$visit_type')";
		$result_visit = mysqli_query($conn, $sql_visit);

		$get_visit_id = "SELECT LAST_INSERT_ID()";
		$result_get = mysqli_query($conn, $get_visit_id);
		$data = mysqli_fetch_row($result_get);
		$visit_id = $data[0];


		$sql_treatment = "INSERT INTO treatment VALUES('$visit_id','$diagnosis','$treatment')";
		$result_treatment = mysqli_query($conn, $sql_treatment);
		$sql_presc = "INSERT INTO prescription VALUES('$visit_id','$medicine_id','$quantity','$dosage')";
		$result_presc = mysqli_query($conn, $sql_presc);
	}else{
		$sql_visit = "INSERT INTO visit VALUES(NULL,'$patient_id','$physician_id','$date','$time','$visit_type')";
		$result_visit = mysqli_query($conn, $sql_visit);

		$get_visit_id = "SELECT LAST_INSERT_ID()";
		$result_get = mysqli_query($conn, $get_visit_id);
		$data = mysqli_fetch_row($result_get);
		$visit_id = $data[0];


		$sql_treatment = "INSERT INTO treatment VALUES('$visit_id','$diagnosis','$treatment')";
		$result_treatment = mysqli_query($conn, $sql_treatment);
		$sql_presc = "INSERT INTO prescription VALUES($visit_id,NULL,NULL,NULL)";
		$result_presc = mysqli_query($conn, $sql_presc);
	}


	if(!$result_visit && !$result_treatment && !$result_presc){
		echo 0;
	}else{
		echo 1;
	}
}
?>


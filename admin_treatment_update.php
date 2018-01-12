<?php 
require('sql_connect.php');
require('date.php');

if(!empty($_POST)){
		//Personal Info
	$treatment_id = mysqli_real_escape_string($conn, $_POST['treatment_id']);
	$physician_id = mysqli_real_escape_string($conn, $_POST['physician_id']);
	$patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
	$diagnosis = mysqli_real_escape_string($conn, $_POST['diagnosis']);
	$treatment = mysqli_real_escape_string($conn, $_POST['treatment']);
	$medicine_id = mysqli_real_escape_string($conn, $_POST['medicine_id']);
	$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
	$dosage = mysqli_real_escape_string($conn, $_POST['dosage']);
	
	
	if($medicine_id == ''){
		$sql_presc = "UPDATE prescription SET medicine_id=NULL, quantity=NULL, dosage=NULL WHERE visit_id=".$treatment_id;
		$result_presc = mysqli_query($conn, $sql_presc);

		$sql_visit = "UPDATE visit SET physician_id='$physician_id', patient_id='$patient_id', medicine_id=NULL WHERE visit_id=".$treatment_id;
		$result_visit = mysqli_query($conn, $sql_visit);
	}else{
		$sql_presc = "UPDATE prescription SET medicine_id='$medicine_id', quantity='$quantity', dosage='$dosage' WHERE visit_id=".$treatment_id;
		$result_presc = mysqli_query($conn, $sql_presc);

		$sql_visit = "UPDATE visit SET physician_id='$physician_id', patient_id='$patient_id', medicine_id='$medicine_id' WHERE visit_id=".$treatment_id;
		$result_visit = mysqli_query($conn, $sql_visit);
	}	
	
	$sql_treatment = "UPDATE treatment SET diagnosis='$diagnosis', treatment='$treatment' WHERE treatment_id=".$treatment_id;
	$result_treatment = mysqli_query($conn, $sql_treatment);

	if(!$result_visit && !$result_treatment && !$result_presc){
		echo 0;
	}else{
		echo 1;
	}
}
?>


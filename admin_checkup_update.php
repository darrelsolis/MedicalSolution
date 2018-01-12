<?php 
require('sql_connect.php');
require('date.php');

if(!empty($_POST)){
		//Personal Info
	$checkup_id = mysqli_real_escape_string($conn, $_POST['checkup_id']);
	$physician_id = mysqli_real_escape_string($conn, $_POST['physician_id']);
	$patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
	$complain = mysqli_real_escape_string($conn, $_POST['complain']);
	$weight = mysqli_real_escape_string($conn, $_POST['weight']);
	$height = mysqli_real_escape_string($conn, $_POST['height']);
	$bloodPressure = mysqli_real_escape_string($conn, $_POST['bloodPressure']);
	$allergies = mysqli_real_escape_string($conn, $_POST['allergies']);
	$feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
	$medicine_id = mysqli_real_escape_string($conn, $_POST['medicine_id']);
	$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
	$dosage = mysqli_real_escape_string($conn, $_POST['dosage']);
	
	
	if($medicine_id == ''){
		$sql_presc = "UPDATE prescription SET medicine_id=NULL, quantity=NULL, dosage=NULL WHERE visit_id=".$checkup_id;
		$result_presc = mysqli_query($conn, $sql_presc);

		$sql_visit = "UPDATE visit SET physician_id='$physician_id', patient_id='$patient_id', medicine_id=NULL WHERE visit_id=".$checkup_id;
		$result_visit = mysqli_query($conn, $sql_visit);
	}else{
		$sql_presc = "UPDATE prescription SET medicine_id='$medicine_id', quantity='$quantity', dosage='$dosage' WHERE visit_id=".$checkup_id;
		$result_presc = mysqli_query($conn, $sql_presc);

		$sql_visit = "UPDATE visit SET physician_id='$physician_id', patient_id='$patient_id', medicine_id='$medicine_id' WHERE visit_id=".$checkup_id;
		$result_visit = mysqli_query($conn, $sql_visit);
	}	
	
	$sql_checkup = "UPDATE checkup SET weight='$weight', height='$height', bloodPressure='$bloodPressure', allergies='$allergies', complain='$complain', feedback='$feedback' WHERE checkup_id=".$checkup_id;
	$result_checkup = mysqli_query($conn, $sql_checkup);

	$update_patient = "UPDATE patient SET weight='$weight', height='$height', bloodPressure='$bloodPressure' WHERE patient_id=".$patient_id;
	$result_update = mysqli_query($conn, $update_patient);

	if(!$result_visit && !$result_checkup && !$result_update && !$result_presc){
		echo 0;
	}else{
		echo 1;
	}
}
?>


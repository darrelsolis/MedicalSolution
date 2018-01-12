<?php 
require('sql_connect.php');
require('date.php');

if(!empty($_POST)){
	$appointment_id = mysqli_real_escape_string($conn, $_POST['appointment_id']);
	$physician_id = mysqli_real_escape_string($conn, $_POST['physician_id']);
	$patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
	$visit_type = mysqli_real_escape_string($conn, $_POST['visit_type']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	
	$sql_update = "UPDATE appointment SET physician_id='$physician_id', patient_id='$patient_id', visit_type='$visit_type', date='$date', time='$time'
				   WHERE appointment_id=".$appointment_id;
	$result_update = mysqli_query($conn, $sql_update);
	if(!$result_update){
		echo 0;
	}else{
		echo 1;
	}
}
?>


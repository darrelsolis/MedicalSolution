<?php 
require('sql_connect.php');
require('date.php');

if(!empty($_POST)){
	
	$physician_id = mysqli_real_escape_string($conn, $_POST['physician_id']);
	$patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
	$visit_type = mysqli_real_escape_string($conn, $_POST['visit_type']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);


	$sql = "INSERT INTO appointment VALUES(NULL, '$patient_id', '$physician_id', '$visit_type', '$date', '$time', 'Ongoing', 'Pending')";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo 1;
	}else{
		echo 0;
	}
}
?>


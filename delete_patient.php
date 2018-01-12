<?php 
	require('sql_connect.php');

	$patient_id = $_POST['patient_id'];

	$sql_patient = "DELETE FROM patient WHERE patient_id=".$patient_id;
	$sql_user = "DELETE FROM userdata WHERE user_id=".$patient_id;

	$recordExist = 0;
	$sql_check_records = "SELECT patient_id FROM visit";
	$result_records = mysqli_query($conn, $sql_check_records);
	if($result_records->num_rows > 0){
		while($row_records = $result_records->fetch_array()){
			if($row_records['patient_id'] == $patient_id){
				$recordExist++;
			}
		}
	}

	$sql_check_records2 = "SELECT patient_id FROM appointment";
	$result_records2 = mysqli_query($conn, $sql_check_records2);
	if($result_records2->num_rows > 0){
		while($row_records2 = $result_records2->fetch_array()){
			if($row_records2['patient_id'] == $patient_id){
				$recordExist++;
			}
		}
	}

	if($recordExist > 0){
		echo 2;
	}else{
		$delete_patient_record = mysqli_query($conn, $sql_patient);
		$delete_user_record = mysqli_query($conn, $sql_user);
		if($delete_patient_record && $delete_user_record){
			echo 1;
		}
	}
 ?>
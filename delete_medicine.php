<?php 
	require('sql_connect.php');

	$medicine_id = $_POST['medicine_id'];

	$sql_medicine = "DELETE FROM medicine WHERE medicine_id=".$medicine_id;

	$recordExist = 0;
	$sql_check_records = "SELECT medicine_id FROM prescription";
	$result_records = mysqli_query($conn, $sql_check_records);
	if($result_records->num_rows > 0){
		while($row_records = $result_records->fetch_array()){
			if($row_records['medicine_id'] == $medicine_id){
				$recordExist++;
			}
		}
	}

	if($recordExist > 0){
		echo 2;
	}else{
		$delete_medicine = mysqli_query($conn, $sql_medicine);
		if($delete_medicine){
			echo 1;
		}
	}
 ?>
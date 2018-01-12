<?php 
	require('sql_connect.php');

	$physician_id = $_POST['physician_id'];

	$sql_physician = "DELETE FROM physician WHERE physician_id=".$physician_id;
	$sql_user = "DELETE FROM userdata WHERE user_id=".$physician_id;

	$recordExist = 0;
	$sql_check_records = "SELECT physician_id FROM visit";
	$result_records = mysqli_query($conn, $sql_check_records);
	if($result_records->num_rows > 0){
		while($row_records = $result_records->fetch_array()){
			if($row_records['physician_id'] == $physician_id){
				$recordExist++;
			}
		}
	}

	$sql_check_records2 = "SELECT physician_id FROM appointment";
	$result_records2 = mysqli_query($conn, $sql_check_records2);
	if($result_records2->num_rows > 0){
		while($row_records2 = $result_records2->fetch_array()){
			if($row_records2['physician_id'] == $physician_id){
				$recordExist++;
			}
		}
	}

	if($recordExist > 0){
		echo 2;
	}else{
		$delete_physician_record = mysqli_query($conn, $sql_physician);
		$delete_user_record = mysqli_query($conn, $sql_user);
		if($delete_physician_record && $delete_user_record){
			echo 1;
		}
	}	
 ?>
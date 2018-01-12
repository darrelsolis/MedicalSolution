<?php 
	require('sql_connect.php');
	if(isset($_POST["patient_id"])){
		$patient_id = $_POST["patient_id"];
		$sql = "SELECT * FROM userdata JOIN patient ON userdata.user_id=patient.patient_id WHERE patient_id=".$patient_id;
		$result = mysqli_query($conn,$sql);
		$row = $result->fetch_array();

		$birthmonth = date("m", strtotime($row['birthdate']));
	    $birthday = date("j",strtotime($row['birthdate']));
	    $birthyear = date("Y",strtotime($row['birthdate']));

	    $row['birthmonth'] = $birthmonth;
	    $row['birthday'] = $birthday;
	    $row['birthyear'] = $birthyear;

	    echo json_encode($row);
	}
 ?>
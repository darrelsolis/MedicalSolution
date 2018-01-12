<?php 
	require('sql_connect.php');
	if(isset($_POST["admin_id"])){
		$admin_id = $_POST["admin_id"];
		$sql = "SELECT * FROM userdata WHERE user_id=".$admin_id;
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
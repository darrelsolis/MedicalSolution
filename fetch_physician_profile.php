<?php 
	require('sql_connect.php');
	if(isset($_POST["physician_id"])){
		$physician_id = $_POST["physician_id"];
		$sql = "SELECT * FROM userdata JOIN physician ON userdata.user_id=physician.physician_id WHERE user_id=".$physician_id;
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
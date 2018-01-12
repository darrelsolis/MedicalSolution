<?php 
	require('sql_connect.php');
	if(isset($_POST["medicine_id"])){
		$medicine_id = $_POST["medicine_id"];
		$sql = "SELECT * FROM medicine WHERE medicine_id=".$medicine_id;
		$result = mysqli_query($conn,$sql);
		$row = $result->fetch_array();
	    echo json_encode($row);
	}
 ?>
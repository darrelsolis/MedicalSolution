<?php 
require('sql_connect.php');
if(!empty($_POST)){
	$output = "";

	$medicine_id = mysqli_real_escape_string($conn, $_POST['medicine_id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$genericName = mysqli_real_escape_string($conn, $_POST['genericName']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$stock = mysqli_real_escape_string($conn, $_POST['stock']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	
	if($medicine_id != ''){
		$sql_update = "UPDATE medicine SET name='$name', genericName='$genericName', description='$description', stock='$stock', price='$price' WHERE medicine_id=".$medicine_id;
		$result_update = mysqli_query($conn, $sql_update);

		if($result_update){
			echo 3;
		}else{
			echo 4;
		}
	}else{
		$sql_insert = "INSERT INTO medicine VALUES(NULL,'$name','$genericName','$description','$stock','$price')";

		$result_insert = mysqli_query($conn, $sql_insert);

		if($result_insert){
			echo 1;
		}else{
			echo 2;
		}
	}
}
?>


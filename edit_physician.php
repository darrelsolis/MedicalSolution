<?php 
require('sql_connect.php');
if(!empty($_POST)){
	$output = "";
		//Personal Info
	$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);

		//Appending year/month/day to be inserted to DB4
	$tempBirthdate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

	$birthdate = mysqli_real_escape_string($conn, $tempBirthdate);		
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);

		//Work info
	$licenseNumber = mysqli_real_escape_string($conn, $_POST['licenseNumber']);
	$department = mysqli_real_escape_string($conn, $_POST['department']);
	$user_type = "Physician";
	$dateRegistered = date("Y-m-d");

		//Email Validation//
	$get_email = "SELECT email, user_id FROM userdata";
	$users_email = mysqli_query($conn,$get_email);
	$emailDuplicate = 0;

	if($users_email->num_rows > 0){
		while($row_email = $users_email->fetch_assoc()){
			if($email == $row_email['email'] && $user_id != $row_email['user_id']){
				$emailDuplicate = 1;
			}
		}
	}

	if($emailDuplicate == 0){
		$sql_personal = "UPDATE userdata SET email='$email', password='$password', firstname='$firstname', lastname='$lastname', gender='$gender', birthdate='$birthdate', address='$address', contact='$contact' WHERE user_id="$user_id;
		$result_personal = mysqli_query($conn, $sql_personal);

		$sql_work = "UPDATE physician SET licenseNumber='$licenseNumber', department='$department' WHERE physician_id=".$user_id;

		$result_work = mysqli_query($conn, $sql_work);
		if($result_personal && $result_work){
			echo 1;
		}else{
			echo 2;
		}		
	}else{
		echo 0;
	}

}
?>
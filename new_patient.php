<?php 
require('sql_connect.php');
require('date.php');
if(!empty($_POST)){
	$output = "";
		//Personal Info
	$user_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);

		//Appending year/month/day to be inserted to DB
	$tempBirthdate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

	$birthdate = mysqli_real_escape_string($conn, $tempBirthdate);		
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);

		//Health info
	$weight = mysqli_real_escape_string($conn, $_POST['weight']);
	$height = mysqli_real_escape_string($conn, $_POST['height']);
	$bloodType = mysqli_real_escape_string($conn, $_POST['bloodType']);
	$bloodPressure = mysqli_real_escape_string($conn, $_POST['bloodPressure']);
	$allergies = mysqli_real_escape_string($conn, $_POST['allergies']);


	$user_type = "Patient";
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
		if($user_id != ''){
			$sql_personal = "UPDATE userdata SET email='$email', password='$password', firstname='$firstname', lastname='$lastname', gender='$gender', birthdate='$birthdate', address='$address', contact='$contact' WHERE user_id=".$user_id;
			$result_personal = mysqli_query($conn, $sql_personal);

			$sql_health = "UPDATE patient SET weight='$weight', height='$height', bloodType='$bloodType', bloodPressure='$bloodPressure', allergies='$allergies' WHERE patient_id=".$user_id;

			$result_health = mysqli_query($conn, $sql_health);
			if($result_personal && $result_health){
				echo 3;
			}else{
				echo 4;
			}
		}else{
			$sql_personal = "INSERT INTO userdata VALUES(NULL,'$email','$password','$firstname','$lastname','$gender','$birthdate','$address','$contact','$user_type','$dateRegistered')";

			$result_personal = mysqli_query($conn, $sql_personal);

			$sql_health = "INSERT INTO patient VALUES($conn->insert_id,'$bloodType','$bloodPressure','$weight','$height','$allergies')";

			$result_health = mysqli_query($conn, $sql_health);

			if($result_personal && $result_health){
				echo 1;
			}else{
				echo 2;
			}
		}		
	}else{
		echo 5;
	}

}
?>


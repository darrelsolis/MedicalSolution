<?php 
require('sql_connect.php');
require('date.php');
session_start();

if(!empty($_POST)){
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

	//Health
	$height = mysqli_real_escape_string($conn, $_POST['height']);
	$weight = mysqli_real_escape_string($conn, $_POST['weight']);
	$bloodType = mysqli_real_escape_string($conn, $_POST['bloodType']);
	$allergies = mysqli_real_escape_string($conn, $_POST['allergies']);

	

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
		$sql_personal = "UPDATE userdata SET email='$email', password='$password', firstname='$firstname', lastname='$lastname', gender='$gender', birthdate='$birthdate', address='$address', contact='$contact' WHERE user_id=".$user_id;
		$result_personal = mysqli_query($conn, $sql_personal);

		$sql_health = "UPDATE patient SET height='$height', weight='$weight', bloodType='$bloodType', allergies='$allergies' WHERE patient_id=".$user_id;
		$result_health = mysqli_query($conn, $sql_health);

		if($result_personal && $result_health){
			echo 1;
			//Personal
			$_SESSION["email"] = $email;
			$_SESSION["password"] = $password; 
			$_SESSION["firstname"] = $firstname;
			$_SESSION["lastname"] = $lastname;
			$_SESSION["fullname"] = $firstname." ".$lastname;
			$_SESSION["gender"] = $gender;
			$_SESSION["birthdate"] = $birthdate;
			$_SESSION["address"] = $address;
			$_SESSION["contact"] = $contact;
			//Health
			$_SESSION["height"] = $height;
			$_SESSION["weight"] = $weight;
			$_SESSION["bloodType"] = $bloodType;
			$_SESSION["allergies"] = $allergies;

		}
	}else{
		echo 0;
	}
}
?>


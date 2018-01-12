<?php
require('date.php');

/*Variable to know if the the license number and email are taken*/
$licenseDup = 0;
$emailDup = 0;

/*Variables get the data from the register form*/
$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];

//Appending the birthdate
$tempBirthdate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$birthdate = $tempBirthdate;

$address = $_POST['address'];
$contact = $_POST['contact'];
$user_type = "Patient";
$dateRegistered = date("Y-m-d");

    //Health info//
$bloodType = $_POST['bloodType'];
$patient_weight = $_POST['weight'];
$patient_height = $_POST['height'];
$allergies = $_POST['allergies'];


/*Checking of email, if there is any duplication of data in the database*/
require("sql_connect.php");
$sql = "SELECT email FROM userdata";
$result = $conn->query($sql);
if ($result->num_rows > 0) {    
    while($row = $result->fetch_assoc()){
        if($row["email"] == $email){
            $emailDup++;
        }
    }       
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/myStyle.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

            <!-- Favicon and touch icons -->
            <link rel="shortcut icon" href="assets/ico/favicon.png">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        </head>

        <body>

            <!-- Top content -->
            <div class="top-content">

                <div class="inner-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 text">
                                <a href="index.php" ><img src="assets/img/logo.png" class="home"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 form-box">
                               <div class="form-top">
                                  <div class="form-top-left">
                                    <?php
                                    /*Data would not be sent to the database if username, email, or both username and email are taken*/
                                    if($emailDup > 0){
                                        echo "<h3> Sorry, your chosen e-mail is already taken.</h3><br>";
                                        echo "<button onclick=goBack() class='chonghua'><i class='fa fa-undo' aria-hidden='true'></i> Back </button>";
                                    }
                                    echo "<script>
                                    function goBack(){
                                        window.history.back();
                                    }
                                </script>";                                       

                                        /*If username and email are both available, and password and confirm password match, 
                                        all the data in the assigned variables will be inserted into "userinfo" table*/
                                        if($emailDup == 0){
                                            $sql_insert_personal = "INSERT INTO userdata VALUES(NULL,'$email','$password','$firstname','$lastname','$gender','$birthdate','$address','$contact','$user_type','$dateRegistered')";



                                            $result_personal = mysqli_query($conn, $sql_insert_personal);

                                            $sql_insert_medical = "INSERT INTO patient VALUES($conn->insert_id,'$bloodType',NULL,'$patient_weight','$patient_height','$allergies')";
                                            $result_medical = mysqli_query($conn, $sql_insert_medical); 

                                            if(!$result_personal && !$result_medical){
                                                echo "Error in SQL Query! Check your query.<br>";
                                                echo "$sql_insert_personal"."<br>";
                                                echo "$sql_insert_medical"."<br>";
                                            }else{
                                                echo "<h3> You are now registered. Please wait for a moment. </h3><br>";
                                                echo "<div class='progress' style='width:700px'>
                                                <div class='progress-bar progress-bar-striped active' role='progressbar' style='width: 100%; background-color: #224100'>
                                                </div>
                                            </div> ";
                                            $conn->close();               
                                            header("Refresh:3; url=index.php"); 
                                        } 
                                    }
                                    ?>
                                </div>
                                <div class="form-top-right">
                                 <i class="fa fa-info" aria-hidden="true"></i>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>

     </div>


     <!-- Javascript -->
     <script src="assets/js/jquery-1.11.1.min.js"></script>
     <script src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="assets/js/jquery.backstretch.min.js"></script>
     <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
            <![endif]-->

        </body>

        </html>
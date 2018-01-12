<?php 
      /*Variables get data from login form*/
        $email = $_POST['email'];
        $password = $_POST['password'];

      /*A variable to determine if login is successful*/
        $loginSuccess = "";

        require('sql_connect.php');
        $sql_login= "SELECT user_id, email, password, user_type FROM userdata";
        
        $result = $conn->query($sql_login);

        $emailFound = 0;
        $successCount = 0;
        
        if ($result->num_rows > 0) {    
            while($row = $result->fetch_assoc()) {  
                  if($row['email'] == $email && $row['password'] == $password){
                      $successCount++;
                      if($row['user_type'] == "Patient"){
                        $loginSuccess = "Patient";  
                      }else if($row['user_type'] == "Physician"){
                        $loginSuccess = "Physician"; 
                      }else if($row['user_type'] == "Admin"){
                        $loginSuccess = "Admin"; 
                      }
                      $id = $row['user_id'];
                      break;

                  }else if($row['email'] == $email && $row['password'] != $password){
                      $emailFound++;
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
        <title>Chong Hua Hospital</title>

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
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h1>Login</h1>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-sign-in"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <?php 
                                    
                                  if($successCount > 0){
                                      if($loginSuccess == "Patient"){
                                            
                                            session_start();
                                            $sql_getData = "SELECT * FROM userdata JOIN patient ON patient.patient_id = userdata.user_id WHERE user_id=$id";
                                            $result = mysqli_query($conn,$sql_getData);
                                            $row = mysqli_fetch_assoc($result);

                                            $_SESSION["user_id"] = $row["user_id"];
                                            $_SESSION["user_type"] = $row["user_type"];
                                            $_SESSION["email"] = $row["email"];
                                            $_SESSION["password"] = $row["password"]; 
                                            $_SESSION["firstname"] = $row["firstname"];
                                            $_SESSION["lastname"] = $row["lastname"];
                                            $_SESSION["fullname"] = "$row[firstname] "."$row[lastname]";
                                            $_SESSION["gender"] = $row["gender"];
                                            $_SESSION["birthdate"] = $row["birthdate"];
                                            $_SESSION["address"] = $row["address"];

                                            $_SESSION["bloodType"] = $row["bloodType"];
                                            $_SESSION["bloodPressure"] = $row["bloodPressure"];
                                            $_SESSION["weight"] = $row["weight"]; 
                                            $_SESSION["height"] = $row["height"];
                                            $_SESSION["allergies"] = $row["allergies"];
                                            $_SESSION["contact"] = $row["contact"]; 
                                            $_SESSION["dateRegistered"] = $row["dateRegistered"];                                     
                                        
                                            echo "<center><h3> You are now logged in as patient. We are redirecting you to our system. </h3></center><br>";
                                            echo "<div class='progress' style='width:500px'>
                                                      <div class='progress-bar progress-bar-striped active' role='progressbar' style='width: 100%;    background-color: #224100'>
                                                      </div>
                                                  </div>";                                
                                            mysqli_free_result($result);
                                            mysqli_close($conn);
                                            header("Refresh:5; url=patient_landing.php");
                                      }else if($loginSuccess == 'Physician'){
                                          
                                          session_start();
                                          $sql_getData = "SELECT * FROM userdata JOIN physician ON physician.physician_id = userdata.user_id WHERE user_id=$id";
                                          $result = mysqli_query($conn,$sql_getData);
                                          $row = mysqli_fetch_assoc($result);

                                          $_SESSION["licenseNumber"] = $row["licenseNumber"];
                                          $_SESSION["department"] = $row["department"];

                                          $_SESSION["user_id"] = $row["user_id"];
                                          $_SESSION["user_type"] = $row["user_type"];
                                          $_SESSION["email"] = $row["email"];
                                          $_SESSION["password"] = $row["password"]; 
                                          $_SESSION["firstname"] = $row["firstname"];
                                          $_SESSION["lastname"] = $row["lastname"];
                                          $_SESSION["fullname"] = "$row[firstname] "."$row[lastname]";
                                          $_SESSION["gender"] = $row["gender"];
                                          $_SESSION["birthdate"] = $row["birthdate"];
                                          $_SESSION["address"] = $row["address"];
                                          $_SESSION["contact"] = $row["contact"]; 
                                          $_SESSION["dateRegistered"] = $row["dateRegistered"];
                                      
                                      
                                          echo "<center><h3> You are now logged in as physician. We are redirecting you to our system. </h3></center><br>";
                                          echo "<div class='progress' style='width:500px'>
                                                      <div class='progress-bar progress-bar-striped active' role='progressbar' style='width: 100%; background-color: #224100'>
                                                      </div>
                                                </div>";                                
                                          mysqli_free_result($result);
                                          mysqli_close($conn);
                                          header("Refresh:5; url=physician_landing.php");
                                      }else if($loginSuccess == "Admin"){
                                          
                                          session_start();
                                          $sql_getData = "SELECT * FROM userdata WHERE user_id=$id";
                                          $result = mysqli_query($conn,$sql_getData);
                                          $row = mysqli_fetch_assoc($result);

                                          $_SESSION["user_id"] = $row["user_id"];
                                          $_SESSION["user_type"] = $row["user_type"];
                                          $_SESSION["email"] = $row["email"];
                                          $_SESSION["password"] = $row["password"]; 
                                          $_SESSION["firstname"] = $row["firstname"];
                                          $_SESSION["lastname"] = $row["lastname"];
                                          $_SESSION["fullname"] = "$row[firstname] "."$row[lastname]";
                                          $_SESSION["gender"] = $row["gender"];
                                          $_SESSION["birthdate"] = $row["birthdate"];
                                          $_SESSION["address"] = $row["address"];
                                          $_SESSION["contact"] = $row["contact"];
                                          $_SESSION["dateRegistered"] = $row["dateRegistered"];
                                        
                                      
                                          echo "<center><h3> You are now logged in as administrator. We are redirecting you to our system. </h3></center><br>";
                                          echo "<div class='progress' style='width:500px'>
                                                      <div class='progress-bar progress-bar-striped active' role='progressbar' style='width: 100%; background-color: #224100'>
                                                      </div>
                                                </div>";                                
                                          mysqli_free_result($result);
                                          mysqli_close($conn);
                                          header("Refresh:5; url=admin.php");
                                      }
                                  }else{
                                          if($emailFound > 0){
                                              echo "E-mail and password do not match. Please try again.<br><br>";
                                              echo "<button onclick=goBack() class='chonghua'><i class='fa fa-undo' aria-hidden='true'></i> Back </button>";
                                              mysqli_close($conn);
                                          }else{
                                              echo "Your email is not registered in the system. Please try again.<br><br>";
                                              echo "<button onclick=goBack() class='chonghua'><i class='fa fa-undo' aria-hidden='true'></i> Back </button>";
                                              mysqli_close($conn);
                                          }                                          
                                  }                                                                                                  
                                ?>
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
        <script>
          function goBack() {
               window.history.back();
          }
        </script>

    </body>

</html>
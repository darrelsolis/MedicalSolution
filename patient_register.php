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

        <!--CSS for jQuery-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">

        <!--Tooltip CSS-->
        <link rel="stylesheet" type="text/css" href="tooltipster-master/dist/css/tooltipster.bundle.min.css" />  
        <link rel="stylesheet" type="text/css" href="tooltipster-master/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css" />
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
                        			<h1>Register as Patient</h1>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-user"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="patient_register_process.php" method="post" class="login-form">
			                    	<div class="form-group">
			                        	<input type="text" name="email" placeholder="E-mail" class="form-username form-control" required>
			                        </div>

			                        <div class="form-group">
			                        	<input type="password" name="password" placeholder="Password" class="form-password form-control" required>
			                        </div>                                    

                                    <div class="form-group">
                                        <input type="text" name="firstname" placeholder="First name" class="form-username form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="lastname" placeholder="Last name" class="form-username form-control" required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <input type="text" name="birthdate" id="datepicker"  placeholder="Birthdate: (YYYY-MM-DD)" class="form-username form-control" required>
                                    </div> -->

                                     <div class="form-group" >
                                        <select name="month" id="month" required class="form-username form-control custom-tooltip" title="Input your birthmonth" style="height:50px; border:3px solid #ddd; width:32.8%; display:inline; " required>
                                            <option value='' style="font-weight: lighter">&nbspMonth </option>
                                            <option value="01" style="font-weight: lighter">&nbspJanuary</option>
                                            <option value="02" style="font-weight: lighter">&nbspFebruary</option>
                                            <option value="03" style="font-weight: lighter">&nbspMarch</option>
                                            <option value="04" style="font-weight: lighter">&nbspApril</option>
                                            <option value="05" style="font-weight: lighter">&nbspMay</option>
                                            <option value="06" style="font-weight: lighter">&nbspJune</option>
                                            <option value="07" style="font-weight: lighter">&nbspJuly</option>
                                            <option value="08" style="font-weight: lighter">&nbspAugust</option>
                                            <option value="09" style="font-weight: lighter">&nbspSeptember</option>
                                            <option value="10" style="font-weight: lighter">&nbspOctober</option>
                                            <option value="11" style="font-weight: lighter">&nbspNovember</option>
                                            <option value="12" style="font-weight: lighter">&nbspDecember</option>
                                        </select>
                                        <select name="day" id="day" placeholder="Last name" class="form-username form-control custom-tooltip" title="Input your birthday" style="height:50px; border:3px solid #ddd; width:32.8%; display:inline" required>
                                            <?php 
                                                echo "<option value='' style='font-weight: lighter'> Day </option>";
                                                for($day=01;$day<=31;$day++){
                                                  echo "<option value='$day' style='font-weight: lighter'>$day</option>";
                                                }
                                                echo "</select>";
                                             ?>
                                        </select>
                                        <select name="year" id="year" placeholder="Last name" class="form-username form-control custom-tooltip" title="Input your birthyear" style="height:50px; border:3px solid #ddd; width:32.5%; display:inline" required>
                                            <?php 
                                                echo "<option value='' style='font-weight: lighter'> Year </option>";
                                                for($i=0;$i<=80;$i++){
                                                  $year=date('Y',strtotime("-$i year"));
                                                  echo "<option value='$year' style='font-weight: lighter'>$year</option>";
                                                }
                                                echo "</select>";
                                             ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="address" placeholder="Address" class="form-username form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="contact" placeholder="Contact Number" class="form-username form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <select name="gender" class="form-username form-control" required style="height:50px; border:3px solid #ddd; width:100%; display:inline; ">
                                              <option value="" style='font-weight: lighter'>&nbspGender</option>
                                              <option value="Male" style='font-weight: lighter'>&nbspMale</option>
                                              <option value="Female" style='font-weight: lighter'>&nbspFemale</option>
                                        </select>
                                    </div>
                                    <hr class="register">
                                    <h4> Health Information: </h4>
                                    <div class="form-group">
                                        <select name="bloodType" class="form-username form-control" required style="height:50px; border:3px solid #ddd; width:100%; display:inline; ">
                                              <option value="" style='font-weight: lighter'>&nbspBlood Type</option>
                                              <option value="O-" style='font-weight: lighter'>&nbspO-</option>
                                              <option value="O+" style='font-weight: lighter'>&nbspO+</option>
                                              <option value="A-" style='font-weight: lighter'>&nbspA-</option>
                                              <option value="A+" style='font-weight: lighter'>&nbspA+</option>
                                              <option value="B-" style='font-weight: lighter'>&nbspB-</option>
                                              <option value="B+" style='font-weight: lighter'>&nbspB+</option>
                                              <option value="AB-" style='font-weight: lighter'>&nbspAB-</option>
                                              <option value="AB+" style='font-weight: lighter'>&nbspAB+</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="weight" placeholder="Current weight (kg)" class="form-username form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="height" placeholder="Current height (cm)" class="form-username form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="allergies" placeholder="Allergies" class="form-username form-control" required>
                                    </div>


			                        <center><button type="submit" class="chonghua"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up </button>&nbsp&nbsp<button onclick=goBack() class='chonghua'><i class='fa fa-undo' aria-hidden='true'></i> Back </button></center>
			                         <script>
                                            function goBack() {
                                                window.history.back();
                                            }
                                     </script>
                                </form>
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

        <!--Datepicker-->        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
        <!--Tooltip JS-->
        <script type="text/javascript" src="tooltipster-master/dist/js/tooltipster.bundle.min.js"></script>

        <!--Datepicker jQuery-->
        <script>
            $( document ).ready(function() {
                $("#datepicker").datepicker({ 
                    format: 'yyyy-mm-dd'
                });
                $("#datepicker").on("change", function () {
                    var fromdate = $(this).val();
                });
            }); 
        </script>   

        <!--Tooltip Script-->
        <script>
          $(document).ready(function() {
            $('.custom-tooltip').tooltipster({
              animation: 'fade',
              delay: 100,
              theme: 'tooltipster-light',
              trigger: 'hover'
            });
          });
        </script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>

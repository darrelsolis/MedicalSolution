<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Request an Appointment</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--CSS for jQuery-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Patient's Profile</a>
            </div>
            <!-- /.navbar-header -->

            
            <ul class="nav navbar-top-links navbar-right">                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['patient_fullname']; ?> <i class="fa fa-caret-down"></i> 
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                        
                        <li>
                            <a href="patient_landing.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-sticky-note fa-fw"></i> Checkups <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view_checkup_patient.php"><i class="fa fa-history fa-fw"></i> View Checkup History</a>                          
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> Appointments <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="request_appointment.php"><i class="fa fa-plus-circle fa-fw"></i> Request an Appointment</a>
                                </li>
                                <li>
                                    <a href="view_appointment.php"><i class="fa fa-calendar-plus-o fa-fw"></i> View Appointments</a>
                                </li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Request an Appointment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input the data for your requested appointment
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="insertAppointment.php" method="POST" role="form">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select name="department" id="department" value='' class="form-control" onChange='change_dept()' required>
                                            <option> -- </option>
                                            <?php 
                                                require('sql_connect.php');
                                                $sql_get_dept = "SELECT DISTINCT department FROM physician WHERE department IS NOT NULL";

                                                $result_get_dept = mysqli_query($conn, $sql_get_dept);  
                                                if ($result_get_dept->num_rows > 0) {                                                   
                                                    while($row = $result_get_dept->fetch_assoc()) {                                                              
                                                            echo "<option value='".$row['department']."'>".$row['department']."</option>";
                                                      }
                                                    header('Content-type: application/json');
                                                }                                                 
                                             ?>
                                             </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Name of Physician</label>
                                            <div id="physician">
                                                <select name="physician" value='' class="form-control" required>
                                                    <option> -- </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Complain</label>
                                            <input type="text" name="complain" class="form-control" required>
                                        </div> 

                                        <div class="form-group">
                                            <label>Date of Appointment</label>                                            
                                            <input type="text" name="date" id="datepicker" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Time of Appointment</label>
                                            <select name="time" class="form-control" required>
                                                <option value="">--</option>
                                                <option value="" disabled style="font-style: italic;">Morning Schedule</option>
                                                <option value="09:30">09:30 AM</option>
                                                <option value="10:00:00">10:00 AM</option>
                                                <option value="10:30:00">10:30 AM</option>
                                                <option value="11:00:00">11:00 AM</option>
                                                <option value="" disabled style="font-style: italic;">Afternoon Schedule</option>
                                                <option value="13:00:00">01:00 PM</option>
                                                <option value="13:30:00">01:30 PM</option>
                                                <option value="14:00:00">02:00 PM</option>
                                                <option value="14:30:00">02:30 PM</option>
                                                <option value="15:00:00">03:00 PM</option>
                                                <option value="15:30:00">03:30 PM</option>
                                                <option value="16:00:00">04:00 PM</option>
                                                <option value="16:30:00">04:30 PM</option>
                                                <option value="17:00:00">05:00 PM</option>
                                                <option value="" disabled style="font-style: italic;">Evening Schedule</option>
                                                <option value="19:00:00">07:00 PM</option>
                                                <option value="19:30:00">07:30 PM</option>
                                                <option value="20:00:00">08:00 PM</option>
                                                <option value="20:30:00">08:30 PM</option>
                                                <option value="21:00:00">09:00 PM</option>
                                                <option value="21:30:00">09:30 PM</option>
                                                <option value="22:00:00">10:00 PM</option>
                                                <option value="22:30:00">10:30 PM</option>
                                                <option value="23:00:00">11:00 PM</option>
                                                <option value="23:30:00">11:30 PM</option>
                                            </select>
                                        </div>                         

                                        <input type="submit" value="Submit" class="btn btn-default">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper --> 

    </div>
    <!-- /#wrapper -->




    <!-- jQuery -->

    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/jquery/jquery-3.1.1.js"></script>
    

    <!--Datepicker jQuery-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
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
    
    <!-- Ajax -->
    <script type="text/javascript">
        function change_dept(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","ajax_dept_physician.php?department="+document.getElementById('department').value,false);
            xmlhttp.send(null);
            document.getElementById("physician").innerHTML=xmlhttp.responseText;
        }
    </script>
    

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>    

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>




</body>

</html>

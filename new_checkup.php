<?php 
    session_start();
    require('sql_connect.php');
    $sql = "SELECT patient_id, patient_firstname, patient_lastname FROM patient";
    $result = mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Checkup</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand">Physician's Profile</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-md fa-fw"></i> <?php echo $_SESSION['physician_fullname']; ?> <i class="fa fa-caret-down"></i> 
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="view_physician_profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                            <a href="physician_landing.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-stethoscope fa-fw"></i> Checkups<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="new_checkup.php"><i class="fa fa-plus fa-fw"></i> New Checkup</a>
                                    </li>
                                    <li>
                                        <a href="view_checkup.php"><i class="fa fa-history fa-fw"></i> View Checkup History</a>
                                    </li>                                    
                                </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> Appointments<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view_appointment_request.php"><i class="fa fa-question-circle fa-fw" aria-hidden="true"></i> View Requests</a>
                                </li>
                                <li>
                                    <a href="approved_appointment.php"><i class="fa fa-calendar-check-o fa-fw" aria-hidden="true"></i> My Appointments</a>
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
                    <h1 class="page-header">New Checkup</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input the data for your patient's checkup
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="insertCheckup.php" method="POST" role="form">

                                        <div class="form-group input-group">
                                            <label>Patient ID</label>
                                            <input type="number" name="patient_id" class="form-control" required>
                                            <span class="input-group-btn">
                                                <button style="bottom:-13px" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal" data-popup='tooltip' title='View Registered Patients'>
                                                    <i class="fa fa-list"></i>
                                                </button>
                                            </span>
                                        </div>

                                        <div class="form-group input-group">
                                            <label>Current Weight</label>
                                            <input type="number" name="weight" class="form-control" placeholder="In kilograms" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <label>Current Height</label>
                                            <input type="number" name="height" class="form-control" placeholder="In centimeters" required>
                                        </div>

                                        <div class="form-group input-group">
                                            <label>Blood Pressure</label>
                                            <input type="text" name="bloodPressure" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Complain</label>
                                            <input type="text" name="complain" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Physician's Feedback</label>
                                            <textarea class="form-control" name="feedback" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Physician's Prescription</label>
                                            <textarea class="form-control" name="prescription" rows="3" required></textarea>
                                        </div>

                                        <input type="submit" value="Submit" class="btn btn-default">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">List of Registered Patients</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="table-responsive">
                                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                        <thead>
                                                                            <tr>                                                    
                                                                                <th>Patient ID</th>
                                                                                <th>Patient Name</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                                if($result->num_rows > 0){
                                                                                            while($row = $result->fetch_assoc()){
                                                                                            echo"
                                                                                                <tr>
                                                                                                    <td>".$row['patient_id']."</td>
                                                                                                    <td>".$row['patient_firstname']." ".$row['patient_lastname']."</td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            ";
                                                                                                    
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- /.table-responsive -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
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
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            order: [[ 1, 'asc' ]]
        });
        
    });
    </script>

</body>

</html>

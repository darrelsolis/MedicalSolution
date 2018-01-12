<?php 
session_start();
require('sql_connect.php');
require('date.php');

$sql_appointment = "SELECT count(appointment_id) FROM appointment";
$sql_treatment = "SELECT count(treatment_id) FROM treatment";
$sql_checkup = "SELECT count(checkup_id) FROM checkup";
$sql_med = "SELECT count(medicine_id) FROM medicine";
$sql_patient = "SELECT count(patient_id) FROM patient";
$sql_phy = "SELECT count(physician_id) FROM physician";



$result_appointment = mysqli_query($conn, $sql_appointment);
$data_appointment_count = mysqli_fetch_row($result_appointment);
$appointmentCount = $data_appointment_count[0];

$result_treatment = mysqli_query($conn, $sql_treatment);
$data_treatment_count = mysqli_fetch_row($result_treatment);
$treatmentCount = $data_treatment_count[0];

$result_checkup = mysqli_query($conn, $sql_checkup);
$data_checkup_count = mysqli_fetch_row($result_checkup);
$checkupCount = $data_checkup_count[0];

$result_medicines = mysqli_query($conn, $sql_med);
$data_medicine_count = mysqli_fetch_row($result_medicines);
$medicineCount = $data_medicine_count[0];

$result_patient = mysqli_query($conn, $sql_patient);
$data_patient_count = mysqli_fetch_row($result_patient);
$patientCount = $data_patient_count[0];

$result_phy = mysqli_query($conn, $sql_phy);
$data_phy_count = mysqli_fetch_row($result_phy);
$physicianCount = $data_phy_count[0];



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="admin.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span style="font-family: 'Trebuchet MS'" class="logo-mini">ADM</span>
        <!-- logo for regular state and mobile devices -->
        <span style="font-family: 'Trebuchet MS'" class="logo-lg">Administrator</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">    
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="dist/img/<?php if($_SESSION['gender'] == 'Male'){echo "user";}else{echo "female";} ?>.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['fullname']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="dist/img/<?php if($_SESSION['gender'] == 'Male'){echo "user";}else{echo "female";} ?>.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['fullname']; ?> - Admin/Developer
                    <small>Administrator since <?php 
                      $date = $_SESSION['dateRegistered'];
                      echo date('F Y', strtotime($date));?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="admin_profile.php" class="btn btn-default "><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="index.php" class="btn btn-default"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/<?php if($_SESSION['gender'] == 'Male'){echo "user";}else{echo "female";} ?>.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['fullname']; ?></p>
              <a><?php echo $_SESSION['user_type'] ?></a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="admin.php">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-cogs"></i> <span>Manage Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="manage_physicians.php"><i class="fa fa-user-md"></i> Physicians</a></li>
                <li><a href="manage_patients.php"><i class="fa fa-user"></i> Patients</a></li>
              </ul>
            </li>

            <li class="treeview">          
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Manage Visitations</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              
              <ul class="treeview-menu">
                <!--Checkups-->
                <li>
                  <a href="#"><i class="fa fa-stethoscope"></i> Checkups
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="add_checkup.php"><i class="fa fa-plus"></i> Add Checkup</a></li>
                    <li><a href="checkup_records.php"><i class="fa fa-book"></i> View Records</a></li>
                  </ul>   
                </li>
                <!--Treatments-->
                <li>
                  <a href="#"><i class="fa fa-ambulance"></i> Treatments
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="add_treatment.php"><i class="fa fa-plus"></i> Add Treatment</a></li>
                    <li><a href="treatment_records.php"><i class="fa fa-book"></i> View Records</a></li>
                  </ul>   
                </li>
              </ul>          
              
            </li>
            
            <li>
              <a href="manage_medicines.php">
                <i class="fa fa-medkit"></i> <span>Manage Medicines</span>
              </a>
            </li>

            <li>
              <a href="#">
                <i class="fa fa-calendar-o"></i> <span>Manage Appointments</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_appointment.php"><i class="fa fa-calendar-plus-o"></i> Add Appointment</a></li>
                <li><a href="appointment_records.php"><i class="fa fa-calendar-check-o"></i> View Appointments</a></li>
              </ul>
            </li>        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Home
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">System's Statistics</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">           

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">System's Statistics</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class='table table-striped'>
                    <thead>

                      <tr>
                        <th width=550>Physicians</th>
                        <td><?php echo $physicianCount; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Patients</th>
                        <td><?php echo $patientCount; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Medicines</th>
                        <td><?php echo $medicineCount; ?> </td>
                      </tr>                       

                      <tr>
                        <th>Checkups</th>
                        <td><?php echo $checkupCount; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Treatments</th>
                        <td><?php echo $treatmentCount; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Appointments</th>
                        <td><?php echo $appointmentCount; ?> </td>                        
                      </tr>

                    </thead>               
                    <tbody>
                      
                   </tbody>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>
           <!-- /.col -->
         </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2017 <a href="admin.php">Physician and Patient's Record System</a>.</strong> All rights
        reserved.
      </footer>

      
      <!-- ./wrapper -->

      <!-- jQuery 2.2.3 -->
      <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
      <!-- Bootstrap 3.3.6 -->
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <!-- DataTables -->
      <script src="plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
      <!-- SlimScroll -->
      <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="plugins/fastclick/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/app.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- page script -->
      <script>
        $(function () {
          $("#example1").DataTable();
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
          });
        });
      </script>
    </body>
    </html>

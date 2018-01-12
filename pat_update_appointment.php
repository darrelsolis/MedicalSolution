<?php 
session_start();
require('sql_connect.php');
$appointment_id = $_GET['appointment_id'];
$patient_id = $_SESSION['user_id'];

$sql_physician = "SELECT physician_id, licenseNumber , firstname, lastname, department FROM physician JOIN userdata ON physician.physician_id = userdata.user_id";
$result_physician = mysqli_query($conn,$sql_physician);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Request an Appointment</title>
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
  <!--Tooltip CSS-->
  <link rel="stylesheet" type="text/css" href="tooltipster-master/dist/css/tooltipster.bundle.min.css" />  
  <link rel="stylesheet" type="text/css" href="tooltipster-master/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css" /> 
  <!--Datepicker CSS-->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css"> 

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
      <a href="patient_landing.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span style="font-family: 'Trebuchet MS'" class="logo-mini">PAT</span>
        <!-- logo for regular state and mobile devices -->
        <span style="font-family: 'Trebuchet MS'" class="logo-lg">Patient's Module</span>
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
                    <?php echo $_SESSION['fullname']; ?>
                    <small>Member since <?php 
                    $date = $_SESSION['dateRegistered'];
                    echo date('F Y', strtotime($date));?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                      <a href="patient_profile.php" class="btn btn-default "><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
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
            <a><?php echo $_SESSION['user_type'];?></a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="patient_landing.php">
              <i class="fa fa-home"></i> <span>Home</span>
            </a>
          </li>


          <li>
            <a href="#">
              <i class="fa fa-user"></i> <span>My Activity</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pat_checkup_records.php"><i class="fa fa-stethoscope"></i> Checkups</a></li>
              <li><a href="pat_treatment_records.php"><i class="fa fa-ambulance"></i> Treatments</a></li>
            </ul>
          </li>

          <li class="active">
            <a href="#">
              <i class="fa fa-calendar"></i> <span>Appointments</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pat_request.php"><i class="fa fa-pencil-square-o"></i> Request Appointment</a></li>
              <li><a href="pat_appointment_records.php"><i class="fa fa-eye"></i> View Appointments</a></li>
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
            Appointments
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calendar-plus-o"></i> Appointments</a></li>
            <li class="active">Request Appointment</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Request Appointment</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" id="pat_appointment_update">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Physician ID</label>
                      <div class="input-group" style="width:60%">  
                        <input required type="text" class="form-control custom-tooltip" title="Click on the button to select your physician" name="physician_id" id="physician_id">
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#physicianList" data-popup='tooltip' title='View Physicians'><i class="fa fa-list"></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Type of Visit</label>
                      <select name="visit_type" id="visit_type" class="form-control" style="width:60%">
                        <option value="">--</option>
                        <option value="Checkup">Checkup</option>
                        <option value="Treatment">Treatment</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Date</label>
                      <input required type="text" class="form-control date" style="width:60%" name="date" id="datepicker">
                    </div>

                    <div class="form-group">
                      <label>Time</label>
                      <select name="time" id="time" class="form-control" required style="width:60%">
                        <option value="">--</option>
                        <option value="" disabled style="font-style: italic;">Morning Schedule</option>
                        <option value="09:30:00">09:30 AM</option>
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

                    <div class="form-group">
                      <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id; ?>">
                      <input type="hidden" name="appointment_id" id="appointment_id" value="<?php echo $appointment_id; ?>">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-share"></i> Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
        </div>

        <!--Modals-->
        <!--Patient Modal-->
        <div class="modal fade" id="patientList" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="">×</button>
                <h4 class="modal-title">List of Registered Patients</h4>
              </div>
              <!--modal header-->
              <div class="modal-body">
                <div class="box-body">
                  <table id="patientTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>                                                    
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if($result_patient->num_rows > 0){
                        while($row_patient = $result_patient->fetch_assoc()){
                          echo"
                          <tr>
                            <td>".$row_patient['patient_id']."</td>
                            <td>".$row_patient['firstname']." ".$row_patient['lastname']."</td>   
                            <td><center><button class='btn btn-info select-patient' data-id='".$row_patient['patient_id']."'><i class='fa fa-hand-pointer-o' aria-hidden='true'></i> Select </button></center></td>                                                                                                                                                
                          </tr>
                          ";
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!--modal footer-->
              </div>
              <!--modal-content-->
            </div>
            <!--modal-dialog modal-lg-->
          </div>
        </div>
        <!--/Patient Modal-->

        <!--Physician Modal-->
        <div class="modal fade" id="physicianList" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="">×</button>
                <h4 class="modal-title">List of Registered Physicians</h4>
              </div>
              <!--modal header-->
              <div class="modal-body">
                <div class="box-body">
                  <table id="physicianTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>                                                    
                        <th>Physician ID</th>
                        <th>License #</th>
                        <th>Physician Name</th>
                        <th>Department</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if($result_physician->num_rows > 0){
                        while($row_physician = $result_physician->fetch_assoc()){
                          echo"
                          <tr>
                            <td>".$row_physician['physician_id']."</td>
                            <td>".$row_physician['licenseNumber']."</td>
                            <td>".$row_physician['firstname']." ".$row_physician['lastname']."</td> 
                            <td>".$row_physician['department']."</td>  
                            <td><center><button class='btn btn-info select-physician' data-id='".$row_physician['physician_id']."'><i class='fa fa-hand-pointer-o' aria-hidden='true'></i> Select </button></center></td>                                                                                                                                                
                          </tr>
                          ";
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!--modal footer-->
              </div>
              <!--modal-content-->
            </div>
            <!--modal-dialog modal-lg-->
          </div>
        </div>
        <!--/Physician Modal-->

        <!--Medicine Modal-->
        <div class="modal fade" id="medicineList" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="">×</button>
                <h4 class="modal-title">List of Registered Medicines</h4>
              </div>
              <!--modal header-->
              <div class="modal-body">
                <div class="box-body">
                  <table id="medicineTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>                                                    
                        <th>Medicine ID</th>
                        <th>Brand Name</th>
                        <th>Generic Name</th>
                        <th>Description</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if($result_medicine->num_rows > 0){
                        while($row_medicine = $result_medicine->fetch_assoc()){
                          echo"
                          <tr>
                            <td>".$row_medicine['medicine_id']."</td>
                            <td>".$row_medicine['name']."</td>
                            <td>".$row_medicine['genericName']."</td> 
                            <td>".$row_medicine['description']."</td>  
                            <td><center><button class='btn btn-info select-medicine' data-id='".$row_medicine['medicine_id']."'><i class='fa fa-hand-pointer-o' aria-hidden='true'></i> Select </button></center></td>                                                                                                                                                
                          </tr>
                          ";
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!--modal footer-->
              </div>
              <!--modal-content-->
            </div>
            <!--modal-dialog modal-lg-->
          </div>
        </div>
        <!--Medicine Modal-->
        <!-- /.content-wrapper -->
        <footer class="main-footer">
          <strong>Copyright &copy; 2017 <a href="patient_landing.php">Physician and Patient's Record System</a>.</strong> All rights
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

        <script type="text/javascript" src="tooltipster-master/dist/js/tooltipster.bundle.min.js"></script>

        <!--Datepicker jQuery-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
        <script>
          $( document ).ready(function() {
            $("#datepicker").datepicker({ 
              format: 'yyyy-mm-dd'
            });
            $("#datepicker").on("change", function () {
              var fromdate = $(this).val();
            });
            $('.custom-tooltip').tooltipster({
              animation: 'fade',
              delay: 100,
              theme: 'tooltipster-light',
              trigger: 'click'
            });
          }); 
        </script>
        <!-- page script -->
        <script>
          $(function () {
            $("#patientTable").DataTable({
              "order":[[0,'asc']]
            });

            $("#physicianTable").DataTable({
              "order":[[0,'asc']]
            });  

            $("#medicineTable").DataTable({
              "order":[[0,'asc']]
            }); 
          });

  //Script for textarea auto adjust
  jQuery.each(jQuery('textarea[data-autoresize]'), function() {
    var offset = this.offsetHeight - this.clientHeight;

    var resizeTextarea = function(el) {
      jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
  });

  $(document).ready(function() { 
    $('[data-toggle="tooltip"]').tooltip();
    
    $('.select-patient').click(function(){
      $("#patient_id").val($(this).data("id"));
      $('#patientList').modal('hide');
    });

    $('.select-physician').click(function(){
      $("#physician_id").val($(this).data("id"));
      $('#physicianList').modal('hide');
    });

    $('.select-medicine').click(function(){
      $("#medicine_id").val($(this).data("id"));
      $('#medicineList').modal('hide');
      document.getElementById('quantity-hidden').style.display = 'block';
      document.getElementById('dosage-hidden').style.display = 'block';
    });
  });

  //Javascript to fetch all the details of the appointment to be updated  
    var appointment_id = document.getElementById("appointment_id").value;
    $.ajax({
      url:"pat_details_appointment.php",
      method: "POST",
      data:{appointment_id:appointment_id},
      dataType:"json",
      success:function(data){
        $('#physician_id').val(data.physician_id);
        $('#visit_type').val(data.visit_type);
        $('.date').val(data.date);
        $('#time').val(data.time);
      }
    });

    $('#pat_appointment_update').on('submit',function(event){    
      event.preventDefault();
      $.ajax({
        url:"pat_appointment_update.php",
        method:"POST",
        data:$('#pat_appointment_update').serialize(),
        success: function(data)
        { 
          if(data == 1){
            sessionStorage.setItem('updateKey', 1);
            window.location = "http://localhost/MedicalSolution/pat_appointment_records.php";  
          }

          if(data == 0){
            $.notify({
                // options
                icon: 'glyphicon glyphicon-ban-circle',
                message: ' Appointment could not be updated. Check your queries' 
              },{
                    // settings
                    type: 'danger',
                    z_index: 6000,
                    delay: 5000
                  });
          }
        }
      });
    });

</script>
</body>
</html>

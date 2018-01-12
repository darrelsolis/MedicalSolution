<?php 
  session_start();
  require('sql_connect.php');
  $sql_physician = "SELECT physician_id, licenseNumber , firstname, lastname, department FROM physician JOIN userdata ON physician.physician_id = userdata.user_id";

  $sql_patient = "SELECT patient_id, firstname, lastname FROM patient JOIN userdata ON patient.patient_id = userdata.user_id";

  $sql_medicine = "SELECT * FROM medicine";

  $result_physician = mysqli_query($conn,$sql_physician);
  $result_patient = mysqli_query($conn, $sql_patient);
  $result_medicine = mysqli_query($conn, $sql_medicine);

  $checkup_id = $_GET["checkup_id"];
  $sql = "SELECT * FROM checkup JOIN visit ON visit.visit_id = checkup.checkup_id JOIN prescription ON checkup.checkup_id = prescription.visit_id WHERE checkup_id=".$checkup_id;
  $result = mysqli_query($conn,$sql);
  $row = $result->fetch_array();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Checkup</title>
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
  <a href="physician_landing.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span style="font-family: 'Trebuchet MS'" class="logo-mini">PHY</span>
    <!-- logo for regular state and mobile devices -->
    <span style="font-family: 'Trebuchet MS'" class="logo-lg">Physician's Module</span>
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
                <?php echo $_SESSION['fullname']; ?> - <?php echo $_SESSION['department']; ?>
                <small>Member since <?php 
                  $date = $_SESSION['dateRegistered'];
                  echo date('F Y', strtotime($date));?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="physician_profile.php" class="btn btn-default "><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
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
          <a><?php echo $_SESSION['user_type']; echo " - "; echo $_SESSION['department'];  ?></a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="physician_landing.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>


        <li class="treeview active">
          <a href="#">
            <i class="fa fa-user"></i> <span>Patient Visitation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active">
              <a href="#"><i class="fa fa-stethoscope"></i> Checkups
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="phy_add_checkup.php"><i class="fa fa-plus"></i> Add Checkup</a></li>
                <li><a href="phy_checkup_records.php"><i class="fa fa-history"></i> View Records</a></li>
              </ul>
            </li>

            <li>
              <a href="#"><i class="fa fa-medkit"></i> Treatments
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="phy_add_treatment.php"><i class="fa fa-plus"></i> Add Treatment</a></li>
                <li><a href="phy_treatment_records.php"><i class="fa fa-history"></i> View Records</a></li>
              </ul>
            </li>
          </ul>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Appointments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="phy_view_requests.php"><i class="fa fa-question"></i> View Requests</a></li>
            <li><a href="phy_appointment_records.php"><i class="fa fa-eye"></i> View Appointments</a></li>
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
        Manage Visitations
        <small>Checkups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-calendar"></i> Manage Visitations</a></li>
        <li>Checkups</li>
        <li class="active">Edit Checkup</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Checkup</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" id="admin_checkup">
              <div class="box-body">
                <div class="form-group">
                  <label>Patient ID</label>
                  <div class="input-group" style="width:60%">  
                    <input required type="text" class="form-control" name="patient_id" id="patient_id" value="<?php echo $row['patient_id']; ?>">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#patientList"><i class="fa fa-list" ></i></button>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Complain</label>
                  <input required type="text" class="form-control" style="width:60%" name="complain" value="<?php echo $row['complain']; ?>">
                </div>

                <div class="form-group">
                  <label>Weight</label>
                  <input required type="number" class="form-control" style="width:60%" name="weight" placeholder="In kilograms" value="<?php echo $row['weight']; ?>">
                </div>

                <div class="form-group">
                  <label>Height</label>
                  <input required type="number" class="form-control" style="width:60%" name="height" placeholder="In centimeters" value="<?php echo $row['height']; ?>">
                </div>

                <div class="form-group">
                  <label>Blood Pressure</label>
                  <input required type="text" class="form-control" style="width:60%" name="bloodPressure" value="<?php echo $row['bloodPressure']; ?>">
                </div>

                <div class="form-group">
                  <label>Allergies</label>
                  <input required type="text" class="form-control" style="width:60%" name="allergies" value="<?php echo $row['allergies']; ?>">
                </div>                

                <div class="form-group">
                  <label>Feedback</label>
                  <textarea required class="form-control" data-autoresize style="box-sizing: border-box; width:60%; resize:none" name="feedback"><?php echo $row['feedback']; ?></textarea>
                </div>

                <div class="form-group">
                  <label>Prescription - Medicine ID</label>
                  <div class="input-group" style="width:60%">  
                    <input type="text" class="form-control" name="medicine_id" id="medicine_id" value="<?php echo $row['medicine_id']; ?>">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#medicineList"><i class="fa fa-list" ></i></button>
                    </div>
                  </div>
                </div>

                <div class="form-group" id="quantity-hidden" style="display:none">
                  <label>Quantity</label>                  
                  <input type="number" class="form-control" id="quantity" name="quantity" style="width:60%" value="<?php echo $row['quantity']; ?>">
                </div>

                <div class="form-group" id="dosage-hidden" style="display:none"> 
                  <label>Dosage</label>                 
                  <input type="text" class="form-control" id="dosage" name="dosage" style="width:60%" value="<?php echo $row['dosage']; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" name="checkup_id" value="<?php echo $checkup_id; ?>">
                  <input type="hidden" name="physician_id" id="physician_id" value="<?php echo $_SESSION['user_id']; ?>">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Update</button>
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
    <strong>Copyright &copy; 2017 <a href="physician_landing.php">Physician and Patient's Record System</a>.</strong> All rights
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

    if($("#medicine_id").val() != ''){
      document.getElementById('quantity-hidden').style.display = 'block';
      document.getElementById('dosage-hidden').style.display = 'block';
    }
  });

  $('#admin_checkup').on('submit',function(event){      
      event.preventDefault();
      $.ajax({
          url:"admin_checkup_update.php",
          method:"POST",
          data:$('#admin_checkup').serialize(),
          success: function(data)
          { 
            if(data == 1){
              sessionStorage.setItem('updateKey', 1);
              window.location = "http://localhost/MedicalSolution/phy_checkup_records.php";  
            }

            if(data == 0){
              $.notify({
                // options
                icon: 'glyphicon glyphicon-ban-circle',
                message: ' Checkup could not be updated. Check your queries' 
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

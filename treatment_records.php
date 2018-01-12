<?php 
session_start();
require('sql_connect.php');
$sql = "SELECT * FROM visit JOIN treatment ON visit.visit_id=treatment.treatment_id 
                            JOIN prescription ON visit.visit_id=prescription.visit_id
                            JOIN userdata phy ON visit.physician_id=phy.user_id
                            JOIN userdata pat ON visit.patient_id=pat.user_id";
$result = mysqli_query($conn,$sql);

$sql_physician = "SELECT physician_id, licenseNumber , firstname, lastname, department FROM physician JOIN userdata ON physician.physician_id = userdata.user_id";

$sql_patient = "SELECT patient_id, firstname, lastname FROM patient JOIN userdata ON patient.patient_id = userdata.user_id";

$sql_medicine = "SELECT * FROM medicine";

$result_physician = mysqli_query($conn,$sql_physician);
$result_patient = mysqli_query($conn, $sql_patient);
$result_medicine = mysqli_query($conn, $sql_medicine);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Treatment Records</title>
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
  <!-- SweetAlert style -->
  <link rel="stylesheet" href="plugins/sweetalert-master/dist/sweetalert.css">
  <!--Custom CSS-->
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
            <li>
              <a href="admin.php">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i> <span>Manage Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="manage_physicians.php"><i class="fa fa-user-md active"></i> Physicians</a></li>
                <li><a href="manage_patients.php"><i class="fa fa-user"></i> Patients</a></li>
              </ul>
            </li>

            <li class="treeview active">          
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Manage Visitations</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <!--Checkups-->
              <ul class="treeview-menu">
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
                <li class="active">
                  <a href="#"><i class="fa fa-ambulance"></i> Treatments
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="add_treatment.php"><i class="fa fa-plus"></i> Add Treatment</a></li>
                    <li class="active"><a href="treatment_records.php"><i class="fa fa-book"></i> View Records</a></li>
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
            Manage Visitations
            <small>Treatments</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calendar"></i> Manage Visitations</a></li>
            <li>Treatments</li>
            <li class="active">View Records</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">           

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Recorded Treaments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="checkupTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Treatment Date</th>
                        <th>Physician</th>
                        <th>Patient</th>
                        <th><!--Checkup Details--></th>
                        <th><!--Prescription Details--></th>
                        <th><!--Edit/Delete--></th>

                      </tr>
                    </thead>               
                    <tbody>
                      <?php 
                      if($result->num_rows > 0){
                        while($row = $result->fetch_array()){
                          echo"
                          <tr>
                           <td>".$row['date']."</td>
                           <td>".$row[16]." ".$row[17]."</td>
                           <td>".$row[27]." ".$row[28]."</td>

                           <td>
                             <center>
                               <button type='button' class='btn btn-primary view-treatment' data-toggle='modal' data-target='#viewTreatment' id='".$row['treatment_id']."'><i class='fa fa-ambulance'></i> View Details</button>
                             </center>
                          </td>

                          <td>
                             <center>
                               <button type='button' class='btn btn-primary view-prescription' data-toggle='modal' data-target='#viewPrescription' id='".$row['visit_id']."'><i class='fa fa-medkit'></i> View Prescription</button>
                             </center>
                          </td>

                           <td>
                             <center>
                               <a href='edit_treatment.php?treatment_id=".$row['treatment_id']."'><button type='button' class='btn btn-info edit_checkup'><i class='fa fa-pencil-square-o'></i> Edit</button></a>
                               <button type='button' class='btn btn-danger delete' id='".$row['treatment_id']."'><i class='fa fa-trash-o'></i> Delete</button>
                             </center>  
                           </td>

                         </tr>";

                                                                                      
                       }
                     }
                     ?>      
                   </tbody>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -
           <!-- /.col -->         
            <!--form-kantor-modal-->
          </div>
      </div>
      <!--/Edit Physician Modal-->
      <div class='modal fade' id='deleteTreatment' tabindex='-1' role='dialog'>
       <div style='background-color: white' class='modal-dialog modal-md'> 
        <div class='modal-editPhysician'>
          <div class='modal-header'>
           <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
           <h4 class='modal-title' id='myModalLabel'>Delete Treatment</h4>
         </div>

         <div class='modal-body'>
          <div class='pad' id='infopanel'></div>                                
          <div class='form-horizontal' style="margin-top: -20px">
            <h5> Are you sure you want to delete this treatment? </h5>
          </div>                  
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal' aria-hidden='true'><i class='fa fa-undo'></i> Cancel</button>
          <button type='button' class='btn btn-danger confirm-delete' aria-hidden='true'><i class='fa fa-trash-o'></i> Delete</button>
        </div>
            </div>
          </div>
        </div>
      </div>

      <!--View Treatment Details - Modal-->
      <div class="modal fade" id="viewTreatment" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-viewTreatment">

          </div>
        </div>
      </div>
      <!--/View Treatment Details - Modal-->

      <!--View Prescription Details - Modal-->
      <div class="modal fade" id="viewPrescription" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-viewPrescription">

          </div>
        </div>
      </div>
      <!--/View Prescription Details - Modal-->
            
      <!--/MODALS-->
      <!-- /.row -->
    </section>
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
<!-- SweetAlert -->
<script src="plugins/sweetalert-master/lib/sweetalert.js"></script>
<!-- Bootstrafy -->
<script src="plugins/bootstrap-notify-master/bootstrap-notify.min.js"></script>


<!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script> -->

<!-- page script -->
<script>
  $(function () {
    $("#checkupTable").DataTable({
      "order":[[0,'desc']]
    });
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

  //CLEAR ALL FORMS IN MODAL WHEN MODAL IS HIDDEN
  // $(function clear(){
  //   $('#firstname').val("");
  //   $('#lastname').val("");
  //   $('#email').val("");
  //   $('#password').val("");
  //   $('#gender').val("");
  //   $('#month').val("");
  //   $('#day').val("");
  //   $('#year').val("");
  //   $('#contact').val("");
  //   $('#address').val("");
  //   $('#licenseNumber').val("");
  //   $('#department').val("");
  //   $('#physician_id').val("");
  // });

  //INSERT AND UPDATE FUNCTIONS
  $(document).ready(function(){
    if(sessionStorage.getItem('insertKey') == 1){
      $.notify({
              // options
              icon: 'glyphicon glyphicon-ok',
              message: ' Treatment has been successfully added to the database.' 
            },{
              // settings
              type: 'success'
            });
      sessionStorage.clear();
    }

    if(sessionStorage.getItem('updateKey') == 1){
      $.notify({
              // options
              icon: 'glyphicon glyphicon-ok',
              message: ' Treatment has been successfully updated.' 
            },{
              // settings
              type: 'success'
            });
      sessionStorage.clear();
    }

    if(sessionStorage.getItem('deleteKey') == 1){
      $.notify({
              // options
              icon: 'glyphicon glyphicon-ok',
              message: ' Treatment has been successfully deleted.' 
            },{
              // settings
              type: 'success'
            });
      sessionStorage.clear();
    }

    // $('#newPhysician').on('hidden.bs.modal', function (e) {
    //   $(this)
    //   .find("input,textarea,select")
    //   .val('')
    //   .end()
    //     // .find("input[type=checkbox], input[type=radio]")
    //     //    .prop("checked", "")
    //     //    .end();
    //   });
    
    //DELETE SCRIPT
    $(document).on('click', '.delete', function(){      
        $('#deleteTreatment').modal('show');
        var treatment_id = $(this).attr("id");
        $('.confirm-delete').on('click', function() {
            $.ajax({
                url:"delete_treatment.php",
                method: "POST",
                data:{treatment_id:treatment_id},
                success:function(data){
                  if(data == 1){
                    sessionStorage.setItem('deleteKey', 1);
                    window.location.reload();  
                  }else{
                    $.notify({
                      // options
                      icon: 'glyphicon glyphicon-ban-circle',
                      message: ' Error occured. Check your queries.' 
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
    });


    // $('#new_physician').on('submit',function(event){      
    //   event.preventDefault();
    //   $.ajax({
    //     url:"new_physician.php",
    //     method:"POST",
    //     data:$('#new_physician').serialize(),
    //     success: function(data)
    //     { 
    //       if(data == 1){
    //         sessionStorage.setItem('key', 1);
    //         window.location.reload();  
    //       }

    //       if(data == 2){
    //         $.notify({
    //           // options
    //           icon: 'glyphicon glyphicon-ban-circle',
    //           message: ' Physician could not be inserted. Check your queries' 
    //         },{
    //               // settings
    //               type: 'danger',
    //               z_index: 6000,
    //               delay: 5000
    //             });
    //       }

    //       if(data == 5){
    //         $.notify({
    //           // options
    //           icon: 'glyphicon glyphicon-ban-circle',
    //           message: ' E-mail is already taken. Input another one.' 
    //         },{
    //               // settings
    //               type: 'danger',
    //               z_index: 6000,
    //               delay: 5000
    //             });
    //       }

    //       if(data == 3){
    //         sessionStorage.setItem('key', 2);
    //         window.location.reload();
    //       }

    //       if(data == 4){
    //         $.notify({
    //           // options
    //           icon: 'glyphicon glyphicon-ban-circle',
    //           message: ' Physician could not be updated. Check your queries' 
    //         },{
    //               // settings
    //               type: 'danger',
    //               z_index: 6000,
    //               delay: 5000
    //             });
    //       }

    //     }
    //   });
    // });
    // Gets the SESSION KEY to be able to notify the user 
    // a successful insert/update/delete even after page reloads
        
  });    
</script>


<script type="text/javascript">
  //Script for VIEWING checkup details inside modal
  $('.view-treatment').click(function(){
    var treatment_id = $(this).attr('id');
    $.ajax({url:"view_treatment_modal.php?treatment_id="+treatment_id,cache:false,success:function(result){
      $(".modal-viewTreatment").html(result);
    }});
  });

  $('.view-prescription').click(function(){
    var visit_id = $(this).attr('id');
    $.ajax({url:"view_prescription_modal.php?visit_id="+visit_id,cache:false,success:function(result){
      $(".modal-viewPrescription").html(result);
    }});
  });

  //Script for textarea auto adjust
  jQuery.each(jQuery('textarea[data-autoresize]'), function() {
    var offset = this.offsetHeight - this.clientHeight;
 
    var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
  });

  //Script for deletion
    // $('.delete').click(function(){
    //   $('#deletePhysician').modal('show');
    //   var element = $(this);
    //   var physician_id = element.attr("id");
    //   var info = 'physician_id='+physician_id;
    //   $('.confirmDelete').click(function(){
    //       $.ajax({
    //         url: 'delete_physician.php'
    //         type: 'POST',
    //         data: info,
    //         success: function(data){
    //           if(data == 1){
    //             sessionStorage.setItem('key', 3);
    //             window.location.reload();  
    //           }

    //           if(data == 2){
    //             $.notify({
    //           // options
    //           icon: 'glyphicon glyphicon-ban-circle',
    //           message: ' Error deleting physician. Delete records connected to physician first.' 
    //         },{
    //               // settings
    //               type: 'danger',
    //               z_index: 6000,
    //               delay: 5000
    //             });
    //           }
    //         }
    //       });
    //     });
      
    // });

  // //Script for EDITING physician's personal details inside modal
  // $('.physician-edit').click(function(){
  //   var physician_id = $(this).attr('data-id');
  // $.ajax({url:"edit_physician_modal.php?physician_id="+physician_id,cache:false,success:function(result){
  //     $(".modal-editPhysician").html(result);
  //   }});
  // });

  // //Script for EDITING PHYSICIAN//
  // $(document).ready(function(){
  //   $('#edit_physician').on('submit',function(event){      
  //     event.preventDefault();
  //     $.ajax({
  //       url:"edit_physician.php",
  //       method:"POST",
  //       data:$('#edit_physician').serialize(),
  //       success: function(data)
  //       { 
  //         if(data == 1){
  //           sessionStorage.setItem('editKey', 1);
  //           window.location.reload();  
  //         }else if(data == 2){
  //           $.notify({
  //           // options
  //           icon: 'glyphicon glyphicon-ban-circle',
  //           message: ' Error updating physician record. Check your queries' 
  //         },{
  //             // settings
  //             type: 'danger',
  //             z_index: 6000,
  //             delay: 5000
  //           });
  //         }else if(data == 0){
  //           $.notify({
  //           // options
  //           icon: 'glyphicon glyphicon-ban-circle',
  //           message: ' E-mail is already taken. Input another one.' 
  //         },{
  //             // settings
  //             type: 'danger',
  //             z_index: 6000,
  //             delay: 5000
  //           });
  //         }        
  //       }
  //     });
  //   });
  //   // Gets the SESSION KEY to be able to notify the user 
  //   // a successful update even after page reloads
  //   if(sessionStorage.getItem('editKey')){
  //     $.notify({
  //           // options
  //           icon: 'glyphicon glyphicon-ok',
  //           message: ' Physician'+"'"+'s profile has been updated' 
  //         },{
  //           // settings
  //           type: 'success'
  //         });
  //     sessionStorage.clear();
  //   }    
  // });
</script>
</body>
</html>


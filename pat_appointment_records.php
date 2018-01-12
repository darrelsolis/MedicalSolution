<?php 
session_start();
require('sql_connect.php');
$patient_id = $_SESSION['user_id'];
$sql = "SELECT * FROM appointment JOIN userdata phy ON appointment.physician_id=phy.user_id JOIN userdata pat ON appointment.patient_id = pat.user_id WHERE patient_id=".$patient_id;
$result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Appointments</title>
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
              <li class="active"><a href="pat_appointment_records.php"><i class="fa fa-eye"></i> View Appointments</a></li>
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
            <li><a href="#"><i class="fa fa-calendar-check-o"></i> Appointments</a></li>
            <li class="active">View Appointments </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">           

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Appointments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="medicineTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Appointment Date</th>
                        <th>Physician Name</th>
                        <th>Visit Type</th>
                        <th>Time</th>
                        <th>Approval</th>
                        <th>Status</th>
                      </tr>
                    </thead>               
                    <tbody>
                      <?php 
                      if($result->num_rows > 0){
                        while($row = $result->fetch_array()){
                          echo"
                          <tr>
                             <td>".$row['date']."</td>
                             <td>".$row[11]." ".$row[12]."</td>
                             <td>".$row['visit_type']."</td>                        
                             <td>".date('h:i A', strtotime($row['time']))."</td>
                             <td>"; 
                                if($row['approval'] == 'Pending'){
                                  echo "<center><button type='button' style='opacity:1.0; width:90%;' class='btn btn-warning' disabled><i class='fa fa-spinner' aria-hidden='true'></i> Pending</button></center>";
                                }else if($row['approval'] == 'Approved'){
                                  echo "<center><button type='button' style='opacity:1.0; width:90%;' class='btn btn-success' disabled><i class='fa fa-check-circle fa-fw' aria-hidden='true'></i> Approved</button></center>";
                                }else{
                                  echo "<center><button type='button' style='opacity:1.0; width:90%;' class='btn btn-danger' disabled><i class='fa fa-times-circle fa-fw' aria-hidden='true'></i> Denied</button></center>";
                                }
                      echo "</td>

                            <td>";
                                if($row['approval'] == 'Pending'){
                                    if($row['status'] == 'Ongoing'){
                                      echo "
                                      <center>
                                      <a href='pat_update_appointment.php?appointment_id=".$row['appointment_id']."'><button type='button' class='btn btn-info'><i class='fa fa-pencil-square-o'></i> Edit</button></a>
                                      <button type='button' class='btn btn-danger cancel' id='".$row['appointment_id']."'><i class='fa fa-times'></i> Cancel</button>
                                      </center>";
                                    }else if($row['status'] == 'Cancelled'){
                                      echo "<center><button type='button' style='opacity:1.0; width:70%' class='btn btn-danger' disabled><i class='fa fa-times-circle fa-fw' aria-hidden='true'></i> Cancelled</button></center>";
                                    }else{
                                      echo "<center><button type='button' style='opacity:1.0; width:70%' class='btn btn-success' disabled><i class='fa fa-check-circle fa-fw' aria-hidden='true'></i> Done</button></center>";
                                    }
                                }else if($row['approval'] == 'Approved'){
                                     if($row['status'] == 'Ongoing'){
                                      echo "
                                      <center>
                                      <button type='button' style='width:70%' class='btn btn-danger cancel' id='".$row['appointment_id']."'><i class='fa fa-times'></i> Cancel</button>
                                      </center>";
                                    }else if($row['status'] == 'Cancelled'){
                                      echo "<center><button type='button' style='opacity:1.0; width:70%' class='btn btn-danger' disabled><i class='fa fa-times-circle fa-fw' aria-hidden='true'></i> Cancelled</button></center>";
                                    }else{
                                      echo "<center><button type='button' style='opacity:1.0; width:70%' class='btn btn-success' disabled><i class='fa fa-check-circle fa-fw' aria-hidden='true'></i> Done</button></center>";
                                    }
                                }else{
                                    echo "<center><button type='button' style='opacity:1.0; width:70%' class='btn btn-danger' disabled><i class='fa fa-times-circle fa-fw' aria-hidden='true'></i> Cancelled</button></center>";
                                }
                      echo "</td>
                         </tr>";                                                                                      
                       }
                     }
                     ?>   
                   </tbody>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>
           <!-- /.col -->
         </div>

         <!--MODALS-->
         <!--/Edit Patient Modal-->
         <div class='modal fade' id='cancelAppointment' tabindex='-1' role='dialog'>
           <div style='background-color: white' class='modal-dialog modal-md'> 
            <div class='modal-cancelAppointment'>
              <div class='modal-header'>
               <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
               <h4 class='modal-title' id='myModalLabel'>Cancel Appointment</h4>
             </div>

             <div class='modal-body'>
              <div class='pad' id='infopanel'></div>                                
              <div class='form-horizontal' style="margin-top: -20px">
                <h5> Are you sure you want to cancel this appointment? </h5>
              </div>                  
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal' aria-hidden='true'><i class='fa fa-undo'></i> Back</button>
              <button type='button' class='btn btn-danger confirm-cancel' aria-hidden='true'><i class='fa fa-times'></i> Cancel</button>
            </div>
          </div>
        </div>
      </div>

          <div>
            <!--form-kantor-modal-->
      </div>
      </div>
      <!--/Edit Patient Modal-->
      <div class='modal fade' id='deleteAppointment' tabindex='-1' role='dialog'>
       <div style='background-color: white' class='modal-dialog modal-md'> 
        <div class='modal-editMedicine'>
          <div class='modal-header'>
           <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
           <h4 class='modal-title' id='myModalLabel'>Delete Appointment</h4>
         </div>

         <div class='modal-body'>
          <div class='pad' id='infopanel'></div>                                
          <div class='form-horizontal' style="margin-top: -20px">
            <h5> Are you sure you want to delete this appointment? </h5>
          </div>                  
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal' aria-hidden='true'><i class='fa fa-undo'></i> Cancel</button>
          <button type='button' class='btn btn-danger confirm-delete' aria-hidden='true'><i class='fa fa-trash-o'></i> Delete</button>
        </div>
            </div>
          </div>
        </div>

      <!--View Medicine's Description-->
      <div class="modal fade" id="viewDescription" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-viewDescription">

          </div>
        </div>
      </div>
      


      <!--/MODALS-->
      <!-- /.row -->
    </section>
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
<!-- SweetAlert -->
<script src="plugins/sweetalert-master/lib/sweetalert.js"></script>
<!-- Bootstrafy -->
<script src="plugins/bootstrap-notify-master/bootstrap-notify.min.js"></script>

<script src=http://hyphenator.googlecode.com/svn/tags/Version%204.2.0/Hyphenator.js></script>



<!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script> -->

<!-- page script -->
<script>
  $(function () {
    $("#medicineTable").DataTable({
      "order":[[0,'desc'],[3,'desc']]
    });   
  });

  

  //CLEAR ALL FORMS IN MODAL WHEN MODAL IS HIDDEN
  $(function clear(){
    $('#name').val("");
    $('#genericName').val("");
    $('#description').val("");
    $('#stock').val("");
    $('#price').val("");
    $('#medicine_id').val("");
  });

  //INSERT AND UPDATE FUNCTIONS
  $(document).ready(function(){
    $('#newMedicine').on('hidden.bs.modal', function (e) {
      $(this)
      .find("input,textarea,select")
      .val('')
      .end()
        // .find("input[type=checkbox], input[type=radio]")
        //    .prop("checked", "")
        //    .end();
      });
    
    $(document).on('click', '.edit_medicine', function(){
      var medicine_id = $(this).attr("id");
      $.ajax({
        url:"fetch_medicine.php",
        method: "POST",
        data:{medicine_id:medicine_id},
        dataType:"json",
        success:function(data){
          $('#name').val(data.name);
          $('#genericName').val(data.genericName);
          $('#description').val(data.description);
          $('#stock').val(data.stock);
          $('#price').val(data.price);
          $('#medicine_id').val(data.medicine_id);
          $('#newMedicine').modal('show');
        }
      });

    });

    
    //DELETE SCRIPT
    $(document).on('click', '.cancel', function(){      
        $('#cancelAppointment').modal('show');
        var appointment_id = $(this).attr("id");
        $('.confirm-cancel').on('click', function() {
            $.ajax({
                url:"pat_cancel_appointment.php",
                method: "POST",
                data:{appointment_id:appointment_id},
                success:function(data){
                  if(data == 1){
                    sessionStorage.setItem('cancelKey', 1);
                    window.location.reload();  
                  }
                }
            });
        });
    });

    // Gets the SESSION KEY to be able to notify the user 
    // a successful insert/update/delete even after page reloads
    if(sessionStorage.getItem('insertKey') == 1){
      $.notify({
              // options
              icon: 'glyphicon glyphicon-ok',
              message: ' Your request has been sent successfully.' 
            },{
              // settings
              type: 'success'
            });
      sessionStorage.clear();
    }
    if(sessionStorage.getItem('cancelKey') == 1){
      $.notify({
              // options
              icon: 'glyphicon glyphicon-ok',
              message: ' Appointment has been cancelled successfully .' 
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
              message: ' Appointment'+"'"+'s information has been updated successfully .' 
            },{
              // settings
              type: 'success'
            });
      sessionStorage.clear();
    }     
  });    
</script>


<script type="text/javascript">
  //Script for VIEWING patient's personal details inside modal
  $('.appointment-view').click(function(){
    var appointment_id = $(this).attr('data-id');
    $.ajax({url:"view_appointment_modal.php?appointment_id="+appointment_id,cache:false,success:function(result){
      $(".modal-viewDescription").html(result);
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


<?php 
session_start();
require('sql_connect.php');
$sql = "SELECT * FROM userdata WHERE user_id=".$_SESSION['user_id'];
$result = mysqli_query($conn,$sql);
$data = $result->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Profile</title>
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

            <li class="treeview">          
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
            Manage Account
            <small>My Profile</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Manage Account</a></li>
            <li class="active">My Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">           

              <div class="box">
                <div class="box-header">
                  <button type="button" class="edit_profile btn btn-primary" id="<?php echo $data['user_id']; ?>"><i class="fa fa-pencil-square-o"></i> Edit Profile</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class='table table-striped'>
                    <thead>
                      <tr>
                        <th colspan="2" ><h4 style="font-weight:bold">Personal Information</h4></th>                                               
                      </tr>

                      <tr>
                        <th> </th>
                        <td> </td>                        
                      </tr>

                      <tr>
                        <th width=300>Date Registered</th>
                        <td><?php echo $data['dateRegistered']; ?> </td>                        
                      </tr>

                      <tr>
                        <th>User Type</th>
                        <td><?php echo $data['user_type']; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Name</th>
                        <td><?php echo $data['firstname']; echo" "; echo $data['lastname']; ?> </td>
                      </tr>

                      <tr>
                        <th>E-mail</th>
                        <td><?php echo $data['email']; ?> </td>                        
                      </tr> 

                      <tr>
                        <th>Gender</th>
                        <td><?php echo $data['gender']; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Birthdate</th>
                        <td><?php echo $data['birthdate']; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Address</th>
                        <td><?php echo $data['address']; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Contact</th>
                        <td><?php echo $data['contact']; ?> </td>                        
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

         <!--MODALS-->
     <div class="modal fade" id="editProfile" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="">×</button>
            <h4 class="modal-title">Edit Profile</h4>
          </div>
          <!--modal header-->
          <div class="modal-body">
            <div class="pad" id="infopanel"></div>
            <div class="form-horizontal">
              <form method="POST" action="" id="updateProfile">
                <div class="form-group"> 
                  <label class="col-sm-3 control-label">Firstname </label>
                  <div class="col-sm-9">
                    <input type="text" name="firstname" class="form-control" id="firstname" required>
                  </div>
                </div>

                <div class="form-group"> 
                  <label class="col-sm-3 control-label">Lastname</label>
                  <div class="col-sm-9">
                    <input type="text" name ="lastname" class="form-control" id="lastname" required>
                  </div>
                </div>

                <div class="form-group"> 
                  <label class="col-sm-3 control-label">E-mail</label>
                  <div class="col-sm-9">
                    <input type="email" name ="email" class="form-control" id="email" required>
                  </div>
                </div>

                <div class="form-group"> 
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" name ="password" class="form-control" id="password" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Gender</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="gender" id="gender" required>
                      <option value="Male"> Male </option>
                      <option value="Female"> Female </option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label" >Birthday </label>
                  <div class="col-sm-9">
                    <select class="form-control"  style="width:32.9%; display: inline;" name="month" value='' id="month" required>
                      <option value=''> Month </option>
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>

                    <?php
                    echo "<select class='form-control' style='width:32.9%; display: inline;' name='day' id='day' required>";
                    echo "<option value=''> Day </option>";
                    for($day=01;$day<=31;$day++){
                      echo "<option value='$day'>$day</option>";
                    }
                    echo "</select>";
                    ?>

                    <?php
                    echo "<select class='form-control' style='width:32.8%; display: inline;' name='year' id='year' required>";
                    echo "<option value=''> Year </option>";
                    for($i=0;$i<=80;$i++){
                      $year=date('Y',strtotime("-$i year"));
                      echo "<option name='$year'>$year</option>";
                    }
                    echo "</select>";
                    ?>
                  </div>
                </div>

                <div class="form-group"> 
                  <label class="col-sm-3 control-label">Contact #</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="contact" id="contact" required>
                  </div>
                </div> 

                <div class="form-group"> 
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
                    <textarea data-autoresize style="box-sizing: border-box; resize: none;" class="form-control" name="address" id="address" required>

                    </textarea>
                    
                  </div>
                </div>

                <div class="form-group"> 
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-9">
                    <input type="hidden" name="admin_id" id="admin_id" value='<?php echo $_SESSION['user_id']; ?>'>
                    <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save"></i> Save</button></div>
                  </form>                   
                </div>

              </div>

              <!--modal footer-->
            </div>
            <!--modal-content-->
          </div>
          </div>
          <!--modal-dialog modal-lg-->
        </div>
            <!--form-kantor-modal-->
      </div>
      
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

<script src=http://hyphenator.googlecode.com/svn/tags/Version%204.2.0/Hyphenator.js></script>



<!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script> -->

<!-- page script -->
<script>
  //INSERT AND UPDATE FUNCTIONS
  $(document).on('click', '.edit_profile', function(){  
        
        var admin_id = $(this).attr("id");
        $.ajax({
            url:"fetch_admin_profile.php",
            method: "POST",
            data:{admin_id:admin_id},
            dataType:"json",
            success:function(data){
              $('#firstname').val(data.firstname);
              $('#lastname').val(data.lastname);
              $('#email').val(data.email);
              $('#password').val(data.password);
              $('#gender').val(data.gender);
              $('#month').val(data.birthmonth);
              $('#day').val(data.birthday);
              $('#year').val(data.birthyear);
              $('#contact').val(data.contact);
              $('#address').val(data.address);
              $('#admin_id').val(data.user_id);
              $('#editProfile').modal('show');
            }
        });
    });


    $('#updateProfile').on('submit',function(event){      
      event.preventDefault();
      $.ajax({
        url:"update_admin.php",
        method:"POST",
        data:$('#updateProfile').serialize(),
        success: function(data)
        { 
          if(data == 1){
            sessionStorage.setItem('admin_profile', 1);
            window.location.reload();  
          }
          if(data == 0){
            $.notify({
              // options
              icon: 'glyphicon glyphicon-ban-circle',
              message: ' E-mail is already taken. Choose another one.' 
            },{
              // settings
              type: 'danger',
              z_index: 6000
            });
          }
        }
      });
    });    
    if(sessionStorage.getItem('admin_profile') == 1){
      $.notify({
              // options
              icon: 'glyphicon glyphicon-ok',
              message: ' Profile has been successfully updated.' 
            },{
              // settings
              type: 'success',
              z_index: 6000
            });
      sessionStorage.clear();
    }
</script>


<script type="text/javascript">
  //Script for VIEWING patient's personal details inside modal
  $('.medicine-view').click(function(){
    var medicine_id = $(this).attr('data-id');
    $.ajax({url:"view_medicine_modal.php?medicine_id="+medicine_id,cache:false,success:function(result){
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


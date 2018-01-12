<?php 
session_start();
require('sql_connect.php');
$sql = "SELECT * FROM userdata JOIN physician ON userdata.user_id=physician.physician_id WHERE user_id=".$_SESSION['user_id'];
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


          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Patient Visitation</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
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
          Manage Account
          <small>My Profile</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-user-md"></i> Manage Account</a></li>
          <li class="active">My Profile</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-xs-12">           

              <div class="box">
                <div class="box-header">
                <button type="button" class="edit_profile btn btn-primary" id="<?php echo $data['user_id']; ?>"> <i class="fa fa-pencil-square-o"></i> Edit Profile</button> 
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class='table table-striped'>
                    <thead>
                      <tr>
                        <th colspan="2"><h4 style="font-weight:bold">Personal Information</h4></th>                                               
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
                        <th>Contact</th>
                        <td><?php echo $data['contact']; ?> </td>                        
                      </tr>
                      
                      <tr>
                        <th>Address</th>
                        <td><?php echo $data['address']; ?> </td>                        
                      </tr>                      

                      <tr>
                        <th> </th>
                        <td> </td>                        
                      </tr>

                      <tr>
                        <th colspan="2"><h4 style="font-weight:bold">Work Information</h4></th>                                               
                      </tr>

                      <tr>
                        <th> </th>
                        <td> </td>                        
                      </tr>

                      <tr>
                        <th>License Number</th>
                        <td><?php echo $data['licenseNumber']; ?> </td>                        
                      </tr>

                      <tr>
                        <th>Department</th>
                        <td><?php echo $data['department']; ?> </td>                        
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
                    <h4 style="font-weight:bold; margin-top:-15px"> Personal Information </h4>
                    <hr>
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

                    <h4 style="font-weight:bold; margin-top:40px"> Work Information</h4>
                    <hr>
                    <div class="form-group"> 
                      <label class="col-sm-3 control-label">License Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="licenseNumber" id="licenseNumber" required>
                      </div>
                    </div>

                    <div class="form-group"> 
                      <label class="col-sm-3 control-label">Department</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="department" id="department" required>
                      </div>
                    </div>


                    <div class="form-group"> 
                      <label class="col-sm-3 control-label"></label>
                      <div class="col-sm-9">
                        <input type="hidden" name="physician_id" id="physician_id" value=''>
                        <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save"></i> Save</button>
                      </div>
                    </form>
                  </div>

                </div>

                <!--modal footer-->
              </div>
              <!--modal-content-->
            </div>
            <!--modal-dialog modal-lg-->
          </div>

      </div>
      <footer class="main-footer">
        <strong>Copyright &copy; 2017 <a href="physician_landing.php">Physician and Patient's Record System</a>.</strong> All rights
        reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-user bg-yellow"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->

          </div>
          <!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                  Some information about this general settings option
                </p>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                  Other sets of options are available
                </p>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div>
              <!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div>
              <!-- /.form-group -->
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
      </aside>
      <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
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
<!-- Bootstrafy -->
<script src="plugins/bootstrap-notify-master/bootstrap-notify.min.js"></script>

<script src=http://hyphenator.googlecode.com/svn/tags/Version%204.2.0/Hyphenator.js></script>
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

<script>
  //INSERT AND UPDATE FUNCTIONS
  $(document).on('click', '.edit_profile', function(){  
      var physician_id = $(this).attr("id");
        $.ajax({
            url:"fetch_physician_profile.php",
            method: "POST",
            data:{physician_id:physician_id},
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
              $('#licenseNumber').val(data.licenseNumber);
              $('#department').val(data.department);
              $('#physician_id').val(data.user_id);
              $('#editProfile').modal('show');
            }
        });
    });

    $('#updateProfile').on('submit',function(event){      
      event.preventDefault();
      $.ajax({
        url:"update_physician.php",
        method:"POST",
        data:$('#updateProfile').serialize(),
        success: function(data)
        { 
          if(data == 1){
            sessionStorage.setItem('phy_profile', 1);
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
    if(sessionStorage.getItem('phy_profile') == 1){
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
    // Gets the SESSION KEY to be able to notify the user 
    // a successful insert/update/delete even after page reloads
        
      
</script>
</body>
</html>


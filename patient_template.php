<header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
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
          <li class="active">
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

          <li>
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
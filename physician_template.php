<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
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
                <li><a href="phy_checkup_records.php"><i class="fa fa-history"></i> View Checkup History</a></li>
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
                <li><a href="phy_treatment_records.php"><i class="fa fa-history"></i> View Treatment History</a></li>
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
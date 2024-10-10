
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="<?php //echo base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="<?php echo base_url()?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Device Monitoring System</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="../Admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              
              </p>
            </a>
          </li>
          <li class="nav-header">Configuration</li>
          <li class="nav-item ">
            <a href="../network/setting" class="nav-link" >
              <i class="nav-icon fas fa-network-wired"></i>
              <p>Network Setting</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../device/setting" class="nav-link">
              <i class="nav-icon fas fa-pager "></i>
              <p>Device Setting</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../device/type" class="nav-link">
              <i class="nav-icon fas fa-server "></i>
              <p>Device List Type</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../disturbance/setting" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Disturbance Record</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="../event/setting" class="nav-link">
              <i class="nav-icon 	fa fa-columns "></i>
              <p>Event Record</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link point" onClick="syncServer()">
              <i class="nav-icon fa fa-spinner"></i>
              <p>Sync to Server</p>
            </a>
          <!-- </li>
           <li class="nav-item">
            <a class="nav-link point" onClick="syncGipat()">
              <i class="nav-icon fa fa-spinner"></i>
              <p>Sync to GIPAT</p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Account Setting</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<div class="loader d-none" style="position:fixed;left:50%;top:50%;z-index:999"></div>
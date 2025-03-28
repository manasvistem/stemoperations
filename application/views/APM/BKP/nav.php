<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

      </li>

      <li class="nav-item d-none d-sm-inline-block">

        <a href="<?=base_url();?>Menu/Dashboard" class="nav-link">Home</a>

      </li>

      </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">

      <!-- Navbar Search -->



      <!-- Messages Dropdown Menu -->

      <?php

        $user = $this->session->userdata('user');

        $data['user'] = $user;$uid = $user['id'];

        $uid= $user['id'];

      ?>

      <h4>HI!  <?=$user['fullname']?></h4>

      <input type="hidden" id="ur_id" value="<?=$uid?>">

      <li class="nav-item">

        <a class="nav-link" href="<?=base_url();?>/Menu/Notification">

          <i class="far fa-bell"></i>

          <?php $notify=$this->Menu_model->get_notifybyid($uid);?>

          <span class="badge badge-warning navbar-badge"><?=sizeof($notify);?></span>

        </a>

      </li>

      <li class="nav-item">

        <a class="nav-link" data-widget="fullscreen" href="#" role="button">

          <i class="fas fa-expand-arrows-alt"></i>

        </a>

      </li>

    </ul>

  </nav>



  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

    <img src="https://stemlearning.in/wp-content/uploads/2020/07/stem-new-logo-2-1.png" width="80%" class="p-3">

    <center><h5 class="text-white"><b>STEM Operation</b></h5></center>

    <hr>



    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image">

          <img src="<?=base_url();?>assets/image/user/Team.jpg" class="img-circle elevation-2" alt="User Image">

        </div>

        <div class="info">

          <a href="#" class="d-block">User Name</a>

        </div>

      </div>





      <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/Dashboard" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Dashboard</p>

            </a>

          </li>



          <!--<li class="nav-item">

            <a href="<?=base_url();?>Menu/SchoolData" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>School Report</p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/validateOldSPD" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Validate School</p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/CreateTask" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Create Task</p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/handoverDetail" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Handover Detail</p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/SchoolWithPC" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Add School</p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/dispatched" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Dispatched</p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/Report" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Report</p>

            </a>

          </li>



          <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>

                Approval

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

           </li>

              <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="<?=base_url();?>Menu/backdrop" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Backdrop</p>

                </a>

              </li>

              </ul>

          </li>-->

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/Total_Handover" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Handover Detail</p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/programs" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Programs Detail</p>

            </a>

          </li>

           <li class="nav-item">

            <a href="<?=base_url();?>Menu/BDRequestBox" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>BD Requests</p>

            </a>

          </li>



          <li class="nav-item">

            <a href="<?=base_url();?>Menu/Mytarget" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>My Target</p>

            </a>

          </li>



          <li class="nav-item">

            <a href="<?=base_url();?>Menu/AcademicCalenderApprove" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Academic Calender Approved</p>

            </a>

          </li>

          <li class="nav-item">

            <a href="<?=base_url();?>Menu/createtask" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Create Task</p>

            </a>

          </li>



          <li class="nav-item">

            <a href="<?=base_url();?>Menu/logout" class="nav-link">

              <i class="far fa-circle nav-icon"></i>

              <p>Logout</p>

            </a>

          </li>



        </ul>

      </nav>

      <hr><center><lable class="text-warning"><b>Alert!</b></lable></center><hr>

    </div>

    <!-- /.sidebar -->

  </aside>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>


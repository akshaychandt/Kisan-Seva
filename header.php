<?php 
   if ($_SESSION['logged_in']!=TRUE) {
       echo "<script>window.location.href='page-login.php';</script>";
   }  
   
   ?>
<script src="assets/bootstrap-toastr/toastr.min.js"></script>
<script src="assets/bootstrap-toastr/toastr.js"></script>
<!-- <script src="assetsassets/js/lib/jquery.blockui.min.js"></script> -->
<link rel="stylesheet" href="assets/bootstrap-toastr/toastr.min.css">
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<div class="header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="float-left">
               <div class="hamburger sidebar-toggle">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
               </div>
            </div>
            <div class="float-right">
               <div class="dropdown dib">
                  <div class="header-icon" data-toggle="dropdown">
                     <span class="user-avatar">
                     <?php echo ucfirst($_SESSION['user']); ?>
                     <i class="fa fa-user fa-lg"></i>
                     </span>
                     <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                        <div class="dropdown-content-body">
                           <ul>
                              <li>
                                 <a href="#">
                                 <i class="ti-user"></i>
                                 <span>Profile</span>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <i class="ti-settings"></i>
                                 <span>Setting</span>
                                 </a>
                              </li>
                              <li>
                                 <a href="logout.php">
                                 <i class="ti-power-off"></i>
                                 <span>Logout</span>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
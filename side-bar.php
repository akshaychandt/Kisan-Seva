<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
   <div class="nano">
      <div class="nano-content">
         <ul>
         <div class="logo">
            <a href="dashboard.php">
               <!-- <img src="assets/images/logo.png" alt="" /> --><span>Kisan Seva</span>
            </a>
         </div>
         <li><a href="dashboard.php"><i class="ti-home"></i> Dashboard</a></li>
         <li><a href="profile.php"><i class="ti-user"></i> Profile</a></li>
         <!--===============================================================================================-->
         <?php if($_SESSION['role'] == "Admin"){ ?>
         <li><a href="agricultureofficer.php"><i class="fa fa-users"></i> Agriculture Officer</a></li>
         <li><a href="technicalstaff.php"><i class="fa fa-users"></i> Technical Staff</a></li>
         <li><a href="notificationmanagement.php"><i class="fa fa-bell-o"></i> Notifications</a></li>
         <li><a href="feedbacks.php"><i class="fa fa-commenting-o"></i> Feedbacks </a></li>
         <li><a href="complaints.php"><i class="fa fa-comments-o"></i> Complaints </a></li>
         <?php }
            elseif ($_SESSION['role'] == "Agriculture_Officer") {
            ?>
         <li><a href="stock.php"><i class="fa fa-houzz"></i> Stocks</a></li>
         <li><a href="requests.php"><i class="fa fa-rocket"></i> Requests </a></li>
         <li><a href="crops.php"><i class="fa fa-pagelines"></i></i> Crops </a></li>
         <li><a href="fertilizer.php"><i class="fa fa-leaf"></i> Fertilizer </a></li>
         <li><a href="pesticides.php"><i class="fa fa-bug"></i> Pesticide </a></li>
         <?php } 
            elseif ($_SESSION['role'] == "Technical_Staff") {
            ?>
         <li><a href="doubt.php"><i class="fa fa-question"></i> Doubts </a></li>
         <li><a href="ideas.php"><i class="fa fa-lightbulb-o"></i> Ideas </a></li>
         <?php } ?>
         <!--===============================================================================================-->
         <li><a href="logout.php"><i class="ti-close"></i> Logout</a></li>
      </div>
   </div>
</div>
<!-- /# sidebar -->
<?php 
   session_start();
   $id = $_SESSION['id'];
   $role = $_SESSION['role'];
   if ($role == 'Admin') {
     $table = 'admin_tb';
   }
   elseif ($role == 'Agriculture_Officer') {
     $table = 'agriculture_officer_tb';
   }
   elseif ($role == 'Technical_Staff') {
     $table = 'technicalstaff_tb';
   }
   include 'connection.php';
   $query=mysqli_query($conn,"SELECT * FROM `$table` WHERE login_id='$id'");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Profile</title>
      <!-- ================= Favicon ================== -->
      <!-- Standard -->
      <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
      <!-- Retina iPad Touch Icon-->
      <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
      <!-- Retina iPhone Touch Icon-->
      <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
      <!-- Standard iPad Touch Icon-->
      <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
      <!-- Standard iPhone Touch Icon-->
      <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
      <!-- Common -->
      <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
      <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
      <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
      <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/lib/helper.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
   </head>
   <body>
      <!-- sidebar -->
      <?php 
         include 'side-bar.php';
         ?>
      <!-- /# sidebar -->
      <!-- header -->
      <?php 
         include 'header.php';
         ?>
      <!-- /# header -->
      <!--===============================================================================================-->
      <!-- Modal-->
      <form method="post">
         <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="col-md-12">
                        <div class="form-group">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Name</label>
                              <input type="text" class="form-control input-default" name="name" id="name" >
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Email</label>
                              <input type="text" class="form-control input-default" name="email" id="email">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Phone</label>
                              <input type="text" class="form-control input-default" name="phone" id="phone">
                              <input type="hidden" name="role" id="role" value="Admin">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button class="btn btn-primary" onclick="saveData()">Save</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Modal -->
      <!--===============================================================================================-->
      <input type="hidden" name="hiddenId" id="hiddenId" value="$id">
      <div class="content-wrap">
         <div class="main">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                     <div class="page-header">
                     </div>
                  </div>
                  <!-- /# column -->
                  <div class="col-lg-4 p-l-0 title-margin-left">
                     <div class="page-header">
                        <div class="page-title">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                 <a href="#">Dashboard</a>
                              </li>
                              <li class="breadcrumb-item active">Profile</li>
                           </ol>
                        </div>
                     </div>
                  </div>
                  <!-- /# column -->
               </div>
               <!-- /# row -->
               <section id="main-content">
                  <div class="row" id="profilediv">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="user-profile">
                                 <div class="row">
                                    <div class="col-lg-8">
                                       <table id="profile_table">
                                        <tbody>
                                          <div class="custom-tab user-profile-tab">
                                             <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active">
                                                   <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                                                </li>
                                             </ul>
                                             <?php
                                                while ($data=mysqli_fetch_assoc($query)) {
                                                ?>
                                             <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="1">
                                                   <div class="basic-information">
                                                      <h4>Basic information</h4>
                                                      <div class="name-content">
                                                         <span class="contact-title">Name:</span>
                                                         <span class="birth-date"><?php echo $data['name'];?></span>
                                                      </div>
                                                   </div>
                                                   <div class="contact-information">
                                                      <h4>Contact information</h4>
                                                      <div class="email-content">
                                                         <span class="contact-title">Email:</span>
                                                         <span class="contact-email"><?php echo $data['email'];?></span>
                                                      </div>
                                                      <div class="phone-content">
                                                         <span class="contact-title">Phone:</span>
                                                         <span class="phone-number"><?php echo $data['phone'];?></span>
                                                      </div>
                                                      <div>
                                                         <button class="btn btn-primary" onclick="editAdminDetails(<?php echo $data['id'];?>)">Edit</button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <?php } ?>
                                          </div>
                                        </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /# row -->
               </section>
            </div>
         </div>
      </div>
      <script>
         function editAdminDetails(id) { 
            $.ajax({
            url: 'gettingAdminData.php',
            type: 'POST',
            dataType:'',
            data: {
            'hiddenId'     : id,
            },
            success: function(data){ 
            
               if(data.status == '0'){
                  toastr.error(data.message,"Error");
               }
               else { 
                 arraydata=JSON.parse(data);
               $('#name').val(arraydata.name);
               $('#username').val(arraydata.username);
               $('#email').val(arraydata.email);
               $('#phone').val(arraydata.phone);
               $('#hiddenId').val(id);
               $('#submitBtn').val('Save');
               $('#adminModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });
               $('#adminModal .modal-title').html('Edit Profile');                   
                  // App.initunblockUI(); 
              }
            },
            error : function(xhr, textStatus, errorThrown) {
             if (xhr.status === 0) {
               alert('Not connected. Verify Network.');
             } else if (xhr.status == 404) {
               alert('Requested page not found. [404]');
             } else if (xhr.status == 500) {
               alert('Server Error [500].'); 
             } else if (errorThrown === 'parsererror') {
               alert('Requested JSON parse failed.');
             } else if (errorThrown === 'timeout') {
               alert('Time out error.');
             } else if (errorThrown === 'abort') {
               alert('Ajax request aborted.');
             } else {
               alert('Remote sever unavailable. Please try later');
             }
            }
            });
            }
      </script>
      <!--===============================================================================================-->
      <script>
         function saveData() {
         var name                = $('#name').val();
         var email               = $('#email').val();
         var phone               = $('#phone').val();
         var hiddenId            = $('#hiddenId').val();
         var role                = $('#role').val();
         if(!Validate()) {
         return false;
         }
         else {
         // App.initblockUI();
         $.ajax({
           url:'saveUserData.php',
           type: 'POST',
           dataType:'',
           data: {
               'name'            : name,
               'email'           : email,
               'phone'           : phone,
               'hiddenId'        : hiddenId,
               'role'            : role,
               },
            success: function(data){
               $( "#profilediv" ).load( "profile.php #profile_table" );
               $('#adminModal').modal('hide');
               toastr.success(data,"Success");
               // alert(data);
               // App.initunblockUI(); 
           },
           error : function(xhr, textStatus, errorThrown) {
             if (xhr.status === 0) {
               alert('Not connected. Verify Network.');
             } else if (xhr.status == 404) {
               alert('Requested page not found. [404]');
             } else if (xhr.status == 500) {
               alert('Server Error [500].'); 
             } else if (errorThrown === 'parsererror') {
               alert('Requested JSON parse failed.');
             } else if (errorThrown === 'timeout') {
               alert('Time out error.');
             } else if (errorThrown === 'abort') {
               alert('Ajax request aborted.');
             } else {
               alert('Remote sever unavailable. Please try later');
             }
           }
         });
         }
         }
         function Validate(){
         
         var errornotice = $("#error");
         var emptyerror  = "Please fill out this field.";
         var numerror    = "Please enter a valid number.";
         
         $('input').removeClass('error');
         $('select').removeClass('error');
         //Validate required fields
         required = ["name","email","uername","phone"];
         
         for (i=0;i<required.length;i++) {
         var input = $('#'+required[i]);
         if ((input.val() == "") || (input.val() == emptyerror)) {
         input.addClass("error");
         /*input.val(emptyerror);*/
         input.attr("placeholder", emptyerror);
         errornotice.slideDown(750);
         } else {
         input.removeClass("error");
         
         }
         }
         if ($(":input").hasClass("error")) {
         return false;
         } else {
         errornotice.hide();
         return true;
         }
         }
      </script>
      <!--===============================================================================================-->
      <!-- Common -->
      <script src="assets/js/lib/jquery.min.js"></script>
      <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
      <script src="assets/js/lib/menubar/sidebar.js"></script>
      <script src="assets/js/lib/preloader/pace.min.js"></script>
      <script src="assets/js/lib/bootstrap.min.js"></script>
      <script src="assets/js/scripts.js"></script>
   </body>
</html>
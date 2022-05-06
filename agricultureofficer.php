<?php 
   session_start();
   include 'connection.php';
   $officer=mysqli_query($conn,"SELECT * FROM `agriculture_officer_tb` WHERE record_status='1'");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Agriculture Officer</title>
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
      <!-- Ajax -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
      <input type="hidden" id="hiddenId" value="">
      <input type="hidden" id="role" value="Agriculture_Officer">
      <!-- Add Modal-->
      <form method="post">
         <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Officer</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Name</label>
                              <input type="text" class="form-control input-sm" name="name" id="name">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Username</label>
                              <input type="text" class="form-control input-sm" name="username" id="username">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Password</label>
                              <input type="password" class="form-control input-sm" name="password" id="password">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Confirm Password</label>
                              <input type="password" class="form-control input-sm" name="cpassword" id="cpassword">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Email</label>
                              <input type="text" class="form-control input-sm" name="email" id="email">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Phone</label>
                              <input type="text" class="form-control input-sm" name="phone" id="phone">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" class="btn btn-primary" onclick="saveOfficerData()">Save</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End ADD Modal -->
      <!--===============================================================================================-->
      <!-- Edit Modal-->
      <form method="post">
         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Officer</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Name</label>
                              <input type="text" class="form-control input-sm" name="editname" id="editname">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Email</label>
                              <input type="text" class="form-control input-sm" name="editemail" id="editemail">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label col-md-5">Phone</label>
                              <input type="text" class="form-control input-sm" name="editphone" id="editphone">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" class="btn btn-primary" onclick="saveOfficerData()">Save</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Edit Modal -->
      <!--===============================================================================================-->   
      <div class="content-wrap">
         <div class="main">
            <div class="container-fluid">
               <section id="main-content">
                  <div class="row">
                     <button style="float: right;" class="btn btn-success" onclick="populateAddModal()">Add Officer</button>
                  </div>
                  <div class="row">
                     <div class="table-responsive">
                        <table class="table table-striped" id="Officer_table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Action <i class="fa fa-cogs"></i></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 while ($data=mysqli_fetch_assoc($officer)) {
                                 ?>
                              <tr>
                                 <th scope="row"><?php echo $data['id'];?></th>
                                 <td><?php echo $data['name'];?></td>
                                 <td><?php echo $data['email'];?></td>
                                 <td><?php echo $data['phone'];?></td>
                                 <td><a href="#" class="btn btn-success" name="editOfficer" onclick="editOfficer(<?php echo $data['id'];?>)">Edit</a>
                                    <a href="#" class="btn btn-danger" name="deleteOfficer" onclick="deleteOfficerData(<?php echo $data['id'];?>)">Delete</a>
                                 </td>
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- /# row -->
               </section>
            </div>
         </div>
      </div>
      <!--===============================================================================================-->
      <script>
         function populateAddModal() 
         { 
               $('#name').val('');
               $('#username').val('');
               $('#email').val('');
               $('#hiddenId').val('');
               $('#password').val('');
               $('#cpassword').val('');
               $('#hiddenId').val('');
               $('#submitBtn').val('Save');
               $('#addModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });           }
      </script>
      <!--===============================================================================================-->
      <script>
         function editOfficer(id) { 
           // App.initblockUI();
            var table    = 'agriculture_officer_tb';
            $.ajax({
            url: 'gettingUserData.php',
            type: 'POST',
            dataType:'',
            data: {
            'hiddenId'     : id,
            'table'        : table
            },
            success: function(data){ 
            
               if(data.status == '0'){
                  toastr.error(data.message,"Error");
               }
               else { 
                 arraydata=JSON.parse(data);
               $('#editname').val(arraydata.name);
               $('#editemail').val(arraydata.email);
               $('#editphone').val(arraydata.phone);
               $('#hiddenId').val(id);
               $('#submitBtn').val('Save');
               $('#editModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });
               $('#editModal .modal-title').html('Edit Officer');                   
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
         function saveOfficerData() {
         var hiddenId            = $('#hiddenId').val();
         var role                = $('#role').val();
         var table               = 'agriculture_officer_tb';
         if (hiddenId == '') {
          var name                = $('#name').val();
          var username            = $('#username').val();
          var password            = $('#password').val(); 
          var email               = $('#email').val();
          var phone               = $('#phone').val(); 
         }
         else{
            var name                = $('#editname').val();
            var email               = $('#editemail').val();
            var phone               = $('#editphone').val();
            var username            = '';
            var password            = '';
         }
         if(!Validate()) {
         return false;
         }
         else {
         $.ajax({
           url:'saveUserData.php',
           type: 'POST',
           dataType:'',
           data: {
               'name'            : name,
               'username'        : username,
               'password'        : password,
               'email'           : email,
               'phone'           : phone,
               'hiddenId'        : hiddenId,
               'role'            : role,
               'table'           : table
               },
            success: function(data){
               $( "#Officer_table" ).load( "agricultureofficer.php #Officer_table" );
               $('#addModal').modal('hide');
               $('#editModal').modal('hide');
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
         var hiddenId    = $('#hiddenId').val();
         if (hiddenId =='') {
         var password    = $('#password').val();
         var cPassword   = $('#cpassword').val();
         }
         if (password != '') {
         if(password!==cPassword){
                 toastr.error('password does not match');
                 return false;
            }
            }
         $('input').removeClass('error');
         $('select').removeClass('error');
         //Validate required fields
         if (hiddenId == "") {
         required = ["name","email","phone","username","password","cpassword"];
         }
         else{
            required = ["editname","editemail","editphone"];
         }
         
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
      <script>
         function deleteOfficerData(id) {
               if(confirm("Are you sure to delete!")){
                     deleteOfficerDetails(id);
               }
         }
         function deleteOfficerDetails(id) {
            var table = 'agriculture_officer_tb';
         $.ajax({
                     url:        'deleteData.php',
                     type:       'POST',
                     dataType:   '',
                     //async:      true,
                     data: {'id'      : id,
                            'table'   : table
                      },
                     success: function(data, status){
                           // toastr.success(data,"Success");
                           $( "#Officer_table" ).load( "agricultureofficer.php #Officer_table" );
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
      <!-- Common -->
      <script src="assets/js/lib/jquery.min.js"></script>
      <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
      <script src="assets/js/lib/menubar/sidebar.js"></script>
      <script src="assets/js/lib/preloader/pace.min.js"></script>
      <script src="assets/js/lib/bootstrap.min.js"></script>
      <script src="assets/js/scripts.js"></script>
   </body>
</html>
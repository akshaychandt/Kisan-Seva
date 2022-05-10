<?php  
   session_start();
   include 'connection.php';
   $officer=mysqli_query($conn,"SELECT request_tb.id,request_tb.request_status,login_tb.username FROM request_tb JOIN login_tb ON request_tb.user_id = login_tb.id WHERE request_tb.request_status = 1");
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Requests</title>
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
      <div class="content-wrap">
         <div class="main">
            <div class="container-fluid">
               <section id="main-content">
                  <div class="row">
                     <div class="table-responsive">
                        <table class="table table-striped" id="request_table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>User</th>
                                 <th>Action <i class="fa fa-cogs"></i></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 while ($data=mysqli_fetch_assoc($officer)) {
                                 ?>
                              <tr>
                                 <th scope="row"><?php echo $data['id'];?></th>
                                 <td><?php echo $data['username'];?></td>
                                 </td>
                                 <td>
                                    <a href="#" class="btn btn-success" name="editStaff" onclick="acceptRequest(<?php echo $data['id'];?>)">Accept</a>
                                    <a href="#" class="btn btn-danger" name="editStaff" onclick="rejectRequest(<?php echo $data['id'];?>)">Reject</a>
                                 </td>
                              </tr>
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
         function rejectRequest(id) {
               if(confirm("Are you sure to delete!")){
                     requestReject(id);
               }
         }
         function requestReject(id) {
            var table  = 'request_tb';
            var action = 'reject';
         $.ajax({
                     url:        'acceptordeleteRequests.php',
                     type:       'POST',
                     dataType:   '',
                     //async:      true,
                     data: {'id'      : id,
                            'table'   : table
                      },
                     success: function(data, status){
                           // toastr.success(data,"Success");
                           $( "#request_table" ).load( "requests.php #request_table" );
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
      <script>
         function acceptRequest(id) {
            var table  = 'request_tb';
         $.ajax({
                     url:        'acceptordeleteRequests.php',
                     type:       'POST',
                     dataType:   '',
                     //async:      true,
                     data: {'id'      : id,
                            'table'   : table
                      },
                     success: function(data, status){
                           // toastr.success(data,"Success");
                           $( "#request_table" ).load( "requests.php #request_table" );
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
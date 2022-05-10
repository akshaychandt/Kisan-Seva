<?php 
   session_start();
   include 'connection.php';
   $fertilizer=mysqli_query($conn,"SELECT * FROM `fertilizer_tb` WHERE record_status='1'");
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Fertilizer</title>
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
      <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
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
      <!-- Add Modal-->
      <form method="post">
         <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Fertilizer</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="control-label col-md-5">Fertilizer</label>
                        <input type="hidden" id="hiddenId" value="">`   
                        <textarea class="form-control" id="fertilizer" rows="6"></textarea>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-5">Usage</label>
                        <textarea class="form-control" id="usage" rows="6"></textarea>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" class="btn btn-primary" onclick="saveFertilizer()">Save</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End ADD Modal -->
      <!--===============================================================================================--> 
      <div class="content-wrap">
         <div class="main">
            <div class="container-fluid">
               <section id="main-content">
                  <div class="row">
                     <button style="float: right;" class="btn btn-success" onclick="populateAddModal()">Add Fertilizer</button>
                  </div>
                  <div class="row">
                     <div class="table-responsive">
                        <table class="table table-striped" id="fertilizer_table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Fertilizer</th>
                                 <th>Use</th>
                                 <th>Action <i class="fa fa-cogs"></i></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 while ($data=mysqli_fetch_assoc($fertilizer)) {
                                 ?>
                              <tr>
                                 <th scope="row"><?php echo $data['id'];?></th>
                                 <td><?php echo $data['fertilizer'];?></td>
                                 <td><?php echo $data['usage'];?></td>
                                 <td><a href="#" class="btn btn-success" name="editFertilizer" onclick="editFertilizer(<?php echo $data['id'];?>)">Edit</a>
                                    <a href="#" class="btn btn-danger" name="deleteFertilizer" onclick="deleteFertilizerData(<?php echo $data['id'];?>)">Delete</a>
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
               $('#fertilzer').val('');
               $('#usage').val('');
               $('#hiddenId').val('');
               $('#submitBtn').val('Save');
               $('#addModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });           }
      </script>
      <!--===============================================================================================-->
      <script>
         function editFertilizer(id) { 
           // App.initblockUI();
            var table    = 'fertilizer_tb';
            $.ajax({
            url: 'getFertilizer.php',
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
               $('#fertilizer').val(arraydata.fertilizer);
               $('#usage').val(arraydata.usage);
               $('#hiddenId').val(id);
               $('#submitBtn').val('Save');
               $('#addModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });
               $('#addModal .modal-title').html('Edit Fertilizer');                   
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
         function saveFertilizer() {
         var fertilizer           = $('#fertilizer').val();
         var usage               = $('#usage').val();
         var hiddenId            = $('#hiddenId').val();
         var table               = 'fertilizer_tb';
         if(!Validate()) {
         return false;
         }
         else {
         // App.initblockUI();
         $.ajax({
           url:'saveFertilizer.php',
           type: 'POST',
           dataType:'',
           data: {
               'fertilizer'       : fertilizer,
               'usage'           : usage,
               'hiddenId'        : hiddenId,
               'table'           : table
               },
            success: function(data){
               $( "#fertilizer_table" ).load( "fertilizer.php #fertilizer_table" );
               $('#addModal').modal('hide');
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
         required = ["date","notification"];
         
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
         function deleteFertilizerData(id) {
               if(confirm("Are you sure to delete!")){
                     deleteFertilizerDetails(id);
               }
         }
         function deleteFertilizerDetails(id) {
            var table = 'fertilizer_tb';
         $.ajax({
                     url:        'deleteData.php',
                     type:       'POST',
                     dataType:   '',
                     //async:      true,
                     data: {'id'      : id,
                            'table'   : table
                      },
                     success: function(data, status){
                           toastr.success(data,"Success");
                           $( "#fertilizer_table" ).load( "fertilizer.php #fertilizer_table" );
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
<?php 
   session_start();
   include 'connection.php';
   $query=mysqli_query($conn,"SELECT * FROM `crops_tb` WHERE record_status='1'");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Crops</title>
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
      <!-- Add Modal-->
      <form method="post" enctype="multipart/form-data" id="crop_form" action="saveCrops.php">
         <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Crops</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="control-label col-md-5">Crops</label>
                        <input type="hidden" id="hiddenId" name="hiddenId" value="">`   
                        <textarea class="form-control" id="crops" name="crops" rows="6"></textarea>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-5">Season</label>
                        <textarea class="form-control" id="season" name="season" rows="6"></textarea>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-5">Image</label>
                        <input type="file" id="image" name="f1">
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-5">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="6"></textarea>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <input type="submit" name="submit" class="btn btn-primary" value="Save">
                     <!-- <button type="button" class="btn btn-primary" onclick="saveCrops()">Save</button> -->
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
                     <button style="float: right;" class="btn btn-success" onclick="populateAddModal()">Add Crops</button>
                  </div>
                  <div class="row">
                     <div class="table-responsive">
                        <table class="table table-striped" id="crops_table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Crops</th>
                                 <th>Season</th>
                                 <th>Photo</th>
                                 <th>description</th>
                                 <th>Action <i class="fa fa-cogs"></i></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 while ($data=mysqli_fetch_assoc($query)) {
                                 ?>
                              <tr>
                                 <th scope="row"><?php echo $data['id'];?></th>
                                 <td><?php echo $data['crops'];?></td>
                                 <td><?php echo $data['season'];?></td>
                                 <td><img src="images/uploads/<?php echo $data['photo'];?>"></td>
                                 <td><?php echo $data['description'];?></td>
                                 <td><a href="#" class="btn btn-success" name="editCrops" onclick="editCrops(<?php echo $data['id'];?>)">Edit</a>
                                    <a href="#" class="btn btn-danger" name="deleteCrops" onclick="deleteCropsData(<?php echo $data['id'];?>)">Delete</a>
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
               $('#crops').val('');
               $('#season').val('');
               $('#description').val('');
               $('#hiddenId').val('');
               $('#submitBtn').val('Save');
               $('#addModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });           }
      </script>
      <!--===============================================================================================-->
      <script>
         function editCrops(id) { 
           // App.initblockUI();
            var table    = 'crops_tb';
            $.ajax({
            url: 'getCrops.php',
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
               $('#crops').val(arraydata.crops);
               $('#season').val(arraydata.season);
               $('#description').val(arraydata.description);
               $('#hiddenId').val(id);
               $('#submitBtn').val('Save');
               $('#addModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });
               $('#addModal .modal-title').html('Edit Crops');                   
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
         function saveCrops(){
            $('#crop_form').submit();
         }
      </script>
      <!--===============================================================================================-->
      <script>
         function deleteCropsData(id) {
               if(confirm("Are you sure to delete!")){
                     deleteCropsDetails(id);
               }
         }
         function deleteCropsDetails(id) {
            var table = 'crops_tb';
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
                           $( "#crops_table" ).load( "crops.php #crops_table" );
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
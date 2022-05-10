<?php 
   session_start();
   include 'connection.php';
   $stock=mysqli_query($conn,"SELECT * FROM `stock_tb` WHERE record_status='1'");
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Stocks</title>
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
      <form method="post">
         <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="control-label col-md-5">Date</label>
                        <input type="date" class="form-control input-sm" name="date" id="date" value="<?php print(date("Y-m-d")); ?>">
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-5">Stock</label>
                        <input type="text"class="form-control input-sm" name="stock" id="stock">
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-5">Quantity</label>
                        <input type="hidden" id="hiddenId" value="">
                        <input type="text" class="form-control input-sm" name="quantity" id="quantity">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" class="btn btn-primary" onclick="saveStocks()">Save</button>
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
                     <button style="float: right;" class="btn btn-success" onclick="populateAddModal()">Add Stock</button>
                  </div>
                  <div class="row">
                     <div class="table-responsive">
                        <table class="table table-striped" id="stock_table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Date</th>
                                 <th>Stock</th>
                                 <th>Quantity</th>
                                 <th>Action <i class="fa fa-cogs"></i></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 while ($data=mysqli_fetch_assoc($stock)) {
                                    $originalDate=$data['date'];
                                    $Date = date("d-m-Y", strtotime($originalDate));
                                 ?>
                              <tr>
                                 <th scope="row"><?php echo $data['id'];?></th>
                                 <td><?php echo $Date;?></td>
                                 <td><?php echo $data['stock'];?></td>
                                 <td><?php echo $data['quantity'];?></td>
                                 <td><a href="#" class="btn btn-success" name="editStock" onclick="editStock(<?php echo $data['id'];?>)">Edit</a>
                                    <a href="#" class="btn btn-danger" name="deleteStock" onclick="deleteStockData(<?php echo $data['id'];?>)">Delete</a>
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
               $('#stock').val('');
               $('#quantity').val('');
               $('#hiddenId').val('');
               $('#submitBtn').val('Save');
               $('#addModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });           }
      </script>
      <!--===============================================================================================-->
      <script>
         function editStock(id) { 
           // App.initblockUI();
            var table    = 'stock_tb';
            $.ajax({
            url: 'getStock.php',
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
               $('#date').val(arraydata.date);
               $('#notification').val(arraydata.notification);
               $('#hiddenId').val(id);
               $('#submitBtn').val('Save');
               $('#addModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });
               $('#addModal .modal-title').html('Edit Stock');                   
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
         function saveStocks() {
         var date                = $('#date').val();
         var stock               = $('#stock').val();
         var quantity            = $('#quantity').val();
         var hiddenId            = $('#hiddenId').val();
         var table               = 'stock_tb';
         if(!Validate()) {
         return false;
         }
         else {
         // App.initblockUI();
         $.ajax({
           url:'saveStock.php',
           type: 'POST',
           dataType:'',
           data: {
               'date'            : date,
               'stock'           : stock,
               'quantity'        : quantity,
               'hiddenId'        : hiddenId,
               'table'           : table
               },
            success: function(data){
               $( "#stock_table" ).load( "stock.php #stock_table" );
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
         function deleteStockData(id) {
               if(confirm("Are you sure to delete!")){
                     deleteStockDetails(id);
               }
         }
         function deleteStockDetails(id) {
            var table = 'notifications_tb';
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
                           $( "#stock_table" ).load( "stock.php #stock_table" );
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
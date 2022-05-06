<?php 
   session_start();
   include 'connection.php';
   $officer=mysqli_query($conn,"SELECT feedbacks_tb.id,feedbacks_tb.feedbacks,feedbacks_tb.reply,login_tb.username FROM feedbacks_tb JOIN login_tb ON feedbacks_tb.user_id = login_tb.id WHERE feedbacks_tb.record_status = 1");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Feedbacks</title>
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
         <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel"> Feedbacks </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="col-md-12">
                        <div class="form-group">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Reply</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="hiddenId" value="">
                           <textarea class="form-control" id="reply" rows="6"></textarea>
                        </div>
                     </div>
                 </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="button" class="btn btn-primary" onclick="saveFeedbacks()">Save</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End ADD Modal -->
      <!--===============================================================================================-->
      <!--===============================================================================================-->   
      <div class="content-wrap">
         <div class="main">
            <div class="container-fluid">

               <section id="main-content">
                  <div class="row">
                     <div class="table-responsive">
                        <table class="table table-striped" id="feedback_table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>User</th>
                                 <th>Feedback</th>
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
                                 <td><?php echo $data['feedbacks'];?>
                                 </td>
                                 <td>
                                    <?php
                                 if($data['reply'] != '' ){?>
                                    <a href="#" class="btn btn-success" name="editStaff" onclick="viewReply(<?php echo $data['id'];?>)">View Reply</a>
                                    <?php }
                                    else{?>

                                    <a href="#" class="btn btn-success" name="editStaff" onclick="reply(<?php echo $data['id'];?>)">Reply</a>
                                    <?php } ?></td>
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
         function reply(id) 
         { 
         
               $('#hiddenId').val(id);
               $('#reply').val('');
               $('#submitBtn').val('Save');
               $('#replyModal').modal({
                     backdrop: 'static',
                        keyboard: false
                  });
              }
      </script>
      <!--===============================================================================================-->
      <script>
      function viewReply(id) { 
        // App.initblockUI();
        var table   = 'feedbacks_tb';
         $.ajax({
         url: 'getReply.php',
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
            $('#reply').val(arraydata.reply);
            $('#hiddenId').val(id);
            $('#submitBtn').val('Save');
            $('#replyModal').modal({
                  backdrop: 'static',
                     keyboard: false
               });
            $('#replyModal .modal-title').html('Edit reply');                   
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
         function saveFeedbacks() {
         var reply                = $('#reply').val();
         var hiddenId             = $('#hiddenId').val();
         if(!Validate()) {
         return false;
         }
         else {
         // App.initblockUI();
         var table   = 'feedbacks_tb';
         $.ajax({
           url:'savereply.php',
           type: 'POST',
           dataType:'',
           data: {
               'reply'           : reply,
               'hiddenId'        : hiddenId,
               'table'           : table
               },
            success: function(data){
               $( "#feedback_table" ).load( "feedbacks.php #feedback_table" );
               $('#replyModal').modal('hide');
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
         required = ["reply"];
         
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
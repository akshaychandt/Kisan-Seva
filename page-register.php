<?php
   include 'connection.php';
   if (isset($_POST['submit'])) {
       $name=$_POST['name'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $username=$_POST['username'];
       $password=$_POST['password'];
       $querytologin_tb=mysqli_query($conn,"INSERT INTO `login_tb`(`username`, `password`, `role`) VALUES('$username','$password','Admin')");
       $id=mysqli_insert_id($conn);
       $query=mysqli_query($conn,"INSERT INTO `admin_tb`(`login_id`,`name`, `email`, `phone`) VALUES('$id','$name','$email','$phone')");
       echo "<script>alert('Success')</script>";
       echo "<script>window.location.href='page-login.php';</script>";
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Sign Up Form</title>
      <!-- Font Icon -->
      <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
      <!-- Main css -->
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <div class="main">
         <div class="container">
            <div class="booking-content">
               <div class="booking-image">
                  <img class="booking-img" src="images/kisan.jpg" alt="Booking Image">
               </div>
               <div class="booking-form">
                  <form id="registration-form" method="post">
                     <h2>Sign Up</h2>
                     <div class="form-group form-input">
                        <input type="text" name="name" id="name" value="" required/>
                        <label for="name" class="form-label">Name</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="email" name="email" id="email" value="" required />
                        <label for="email" class="form-label">Email</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="number" name="phone" id="phone" value="" required />
                        <label for="phone" class="form-label">Phone Number</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="text" name="username" id="name" value="" required/>
                        <label for="username" class="form-label">Username</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="password" name="password" id="name" value="" required/>
                        <input type="hidden" name="role" id="role" value="Admin" required/>
                        <label for="password" class="form-label">Password</label>
                     </div>
                     <!-- <div class="form-group form-input">
                        <input type="password" name="confirm_password" id="name" value="" required/>
                        <label for="name" class="form-label">Confirm Password</label>
                        </div> -->
                     <div class="form-submit">
                        <input type="submit" value="Sign Up" class="submit" id="submit" name="submit" />
                        <a href="page-login.php" class="vertify-booking">Already have an account? Sign In</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- JS -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>
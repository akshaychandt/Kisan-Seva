<?php
   session_start();
   include 'connection.php';
   if (isset($_POST['submit'])) {
   $username=$_POST['username'];
   $password=$_POST['password'];
   $data=mysqli_query($conn,"SELECT * FROM login_tb WHERE username='$username' AND password='$password'");
   if(mysqli_num_rows($data))
   {
   $row=mysqli_fetch_assoc($data);
   $_SESSION['id']=$row['id'];
   $_SESSION['user']=$row['username'];
   $_SESSION['role']=$row['role'];
   $_SESSION['logged_in']=TRUE;
   echo "<script>window.location.href='dashboard.php';</script>";
   }
   else{
   echo "<script>alert('invalid username or password');</script>";
   echo "<script>window.location.href='page-login.php';</script>";
   }
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Sign In Form</title>
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
                  <form id="login-form" method="post">
                     <h2>Sign Up</h2>
                     <div class="form-group form-input">
                        <input type="text" name="username" id="name" value="" required/>
                        <label for="name" class="form-label">Username</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="password" name="password" id="name" value="" required/>
                        <label for="name" class="form-label">Password</label>
                     </div>
                     <div class="form-submit">
                        <input type="submit" value="Sign In" class="submit" id="submit" name="submit" />
                        <a href="page-register.php" class="vertify-booking">Dont have an account? Sign Up</a>
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
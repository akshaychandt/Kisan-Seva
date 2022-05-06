<?php

include'connection.php';
 
$name            = $_POST['name'];
$id              = $_POST['hiddenId'];
$username        = $_POST['username'];
$password        = $_POST['password'];
$email           = $_POST['email'];
$phone           = $_POST['phone'];
$role            = $_POST['role'];
 if ($role == 'Admin') {
   $table = 'admin_tb';
 }
 elseif ($role == 'Agriculture_Officer') {
   $table = 'agriculture_officer_tb';
}
 elseif ($role == 'Technical_Staff') {
     $table = 'technicalstaff_tb';
 }

if ($role == "Admin") {
	if ($id <> '') {
	$result=mysqli_query($conn,"UPDATE `$table` SET `name`='$name',`email`='$email',`phone`='$phone'WHERE id='$id'");
	$output = "Data Updated";
}
}
else{
if ($id <> '') {
	$result=mysqli_query($conn,"UPDATE `$table` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE id='$id'");
	$output = "Data Updated";
}
else{
	$query=mysqli_query($conn,"INSERT INTO `login_tb`(`username`, `password`, `role`) VALUES ('$username','$password','Agriculture Officer')");
	$login_id=mysqli_insert_id($conn);
	$result=mysqli_query($conn,"INSERT INTO `$table`( `login_id`,`name`, `email`, `phone`) VALUES ('$login_id','$name','$email','$phone')");
	$output = "Data Inserted";
}
}
echo($output);

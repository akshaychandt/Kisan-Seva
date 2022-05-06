<?php

include'connection.php';
 
$date             = $_POST['date'];
$notification     = $_POST['notification'];
$table            = $_POST['table'];
$id               = $_POST['hiddenId'];
if ($id <> '') {
$result=mysqli_query($conn,"UPDATE `$table` SET `date`='$date',`notification`='$notification' WHERE id='$id'");
$output = "Data Updated";
}
else{
$result = mysqli_query($conn,"INSERT INTO `notifications_tb`(`date`, `notification`, `record_status`) VALUES ('$date','$notification',1)");
$output = "Data Inserted";
}
echo($output);

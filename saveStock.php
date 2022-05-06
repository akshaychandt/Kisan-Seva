<?php

include'connection.php';
 
$date             = $_POST['date'];
$stock            = $_POST['stock'];
$quantity         = $_POST['quantity'];
$table            = $_POST['table'];
$id               = $_POST['hiddenId'];
if ($id <> '') {
$result=mysqli_query($conn,"UPDATE `$table` SET `date`='$date',`stock`='$stock' WHERE id='$id'");
$output = "Data Updated";
}
else{
$result = mysqli_query($conn,"INSERT INTO `$table`(`date`, `stock`, `quantity`, `record_status`) VALUES ('$date','$stock','$quantity',1)");
$output = "Data Inserted";
}
echo($output);

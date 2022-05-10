<?php

include'connection.php';
 
$date             = $_POST['date'];
$ideas            = $_POST['ideas'];
$table            = $_POST['table'];
$id               = $_POST['hiddenId'];
if ($id <> '') {
$result=mysqli_query($conn,"UPDATE `$table` SET `date`='$date',`ideas`='$ideas' WHERE id='$id'");
$output = "Data Updated";
}
else{
$result = mysqli_query($conn,"INSERT INTO `$table`(`date`, `ideas`, `record_status`) VALUES ('$date','$ideas',1)");
$output = "Data Inserted";
}
echo($output);

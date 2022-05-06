<?php

include'connection.php';
 
$fertilizer       = $_POST['fertilizer'];
$usage            = $_POST['usage'];
$table            = $_POST['table'];
$id               = $_POST['hiddenId'];
if ($id <> '') {
$result=mysqli_query($conn,"UPDATE `$table` SET `fertilizer`='$fertilizer',`usage`='$usage' WHERE id='$id'");
$output = "Data Updated";
}
else{
$result = mysqli_query($conn,"INSERT INTO `$table`(`fertilizer`, `usage`, `record_status`) VALUES ('$fertilizer','$usage',1)");
$output = "Data Inserted";
}
echo($output);

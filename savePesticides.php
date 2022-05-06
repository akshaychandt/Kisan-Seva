<?php

include'connection.php';
 
$pesticides       = $_POST['pesticides'];
$usage            = $_POST['usage'];
$table            = $_POST['table'];
$id               = $_POST['hiddenId'];
if ($id <> '') {
$result=mysqli_query($conn,"UPDATE `$table` SET `pesticides`='$pesticides',`usage`='$usage' WHERE id='$id'");
$output = "Data Updated";
}
else{
$result = mysqli_query($conn,"INSERT INTO `$table`(`pesticides`, `usage`, `record_status`) VALUES ('$pesticides','$usage',1)");
$output = "Data Inserted";
}
echo($output);

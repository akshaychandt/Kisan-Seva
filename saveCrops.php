<?php

include'connection.php';
 
$crops            = $_POST['crops'];
$season           = $_POST['season'];
$description      = $_POST['description'];
$table            = $_POST['table'];
$id               = $_POST['hiddenId'];
if ($id <> '') {
$result=mysqli_query($conn,"UPDATE `$table` SET `crops`='$crops',`season`='$season' ,`description`='$description' WHERE id='$id'");
$output = "Data Updated";
}
else{
$result = mysqli_query($conn,"INSERT INTO `$table`(`crops`, `season`, `description`, `record_status`) VALUES ('$crops','$season','$description',1)");
$output = "Data Inserted";
}
echo($output);

<?php

include'connection.php';
 
$reply            = $_POST['reply'];
$table            = $_POST['table'];
$id               = $_POST['hiddenId'];
$result=mysqli_query($conn,"UPDATE `$table` SET `reply`='$reply' WHERE id='$id'");
$output = "Data Updated";
echo($output);

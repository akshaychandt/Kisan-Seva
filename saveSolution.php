<?php

include'connection.php';
 
$solution         = $_POST['solution'];
$table            = $_POST['table'];
$id               = $_POST['hiddenId'];
$result=mysqli_query($conn,"UPDATE `$table` SET `solution`='$solution' WHERE id='$id'");
$output = "Data Updated";
echo($output);

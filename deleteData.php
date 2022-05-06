<?php 

include 'connection.php';

$id                 = $_POST['id'];
$table              = $_POST['table'];
$result = mysqli_query($conn,"UPDATE `$table` SET `record_status`='0' WHERE id = '$id'");
$output="Data Deleted";
echo($output);

?>
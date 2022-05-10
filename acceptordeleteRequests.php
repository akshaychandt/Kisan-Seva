<?php 

include 'connection.php';

$id                 = $_POST['id'];
$table              = $_POST['table'];
$action             = $_POST['action'];
if($action == 'reject'){
$result = mysqli_query($conn,"UPDATE `$table` SET `request_status`='0' WHERE id = '$id'");
$output="Rejected";
}
else{
$result = mysqli_query($conn,"UPDATE `$table` SET `request_status`='2' WHERE id = '$id'");
$output="Accepted";
}
echo($output);

?>
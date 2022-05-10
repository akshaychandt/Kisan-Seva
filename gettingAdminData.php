<?php

include'connection.php';
 session_start();
$id        = $_POST['hiddenId'];
$role = $_SESSION['role'];
if ($role == 'Admin') {
  $table = 'admin_tb';
}
elseif ($role == 'Agriculture_Officer') {
  $table = 'agriculture_officer_tb';
}
elseif ($role == 'Technical_Staff') {
  $table = 'technicalstaff_tb';
}
$result = mysqli_query($conn,"SELECT * FROM `$table` WHERE id='$id'");
if(mysqli_num_rows($result)) {
$row = mysqli_fetch_assoc($result); 
$data   = array(
'name'                    => $row['name'],
'email'                   => $row['email'],
'phone'                   => $row['phone'],
'id'                      => $row['id'],
);  
echo json_encode($data);
}
else {
echo json_encode(array('status'=>0,'message'=>'Error in Processing'));
}

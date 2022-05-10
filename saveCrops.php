<?php
include'connection.php';
$crops            = $_POST['crops'];
$season           = $_POST['season'];
$description      = $_POST['description'];
$id               = $_POST['hiddenId'];
$filenew          = "";
$pic              = $_FILES['f1']['name'];
if($pic!="") 
{
$filearray=pathinfo($_FILES['f1']['name']);
$file1=rand();
$file_ext=$filearray["extension"];
if (check_ext($file_ext))
{
$filenew=$file1.".".$file_ext;
move_uploaded_file($_FILES['f1']['tmp_name'],"images/uploads/".$filenew);
}
else
{
echo "<script> alert('please check file extension')</script>";
}
} 
if ($id <> '') {
$result=mysqli_query($conn,"UPDATE `crops_tb` SET `crops`='$crops',`photo`='$filenew',`season`='$season' ,`description`='$description' WHERE id='$id'");
$output = "Data Updated";
}
else{
$result = mysqli_query($conn,"INSERT INTO `crops_tb`(`crops`,`photo`, `season`, `description`, `record_status`) VALUES ('$crops','$filenew','$season','$description',1)");
$output = "Data Inserted";
}
echo "<script>window.location.href='crops.php';</script>";
// echo($output);
function check_ext($f_ext)
{
$allowed= array('jpg','png','jpeg');
if(in_array($f_ext,$allowed))
{
return true;
}
else
{
return false;
}
}
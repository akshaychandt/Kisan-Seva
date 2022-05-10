<?php
    include"../connection.php";
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $querytologin_tb=mysqli_query($conn,"INSERT INTO `login_tb`(`username`, `password`, `role`) VALUES('$username','$password','Farmer')");
    $id=mysqli_insert_id($conn);
    $query=mysqli_query($conn,"INSERT INTO `farmers_tb`(`login_id`,`name`, `email`, `phone`) VALUES('$id','$name','$email','$phone')");
    if ($query && $querytologin_tb) {
    echo "true";
}

else{
    echo "Something went wrong";
}

?>
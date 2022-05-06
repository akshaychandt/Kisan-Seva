<?php
session_start();
$_SESSION['logged_in']=FALSE;
session_destroy();
echo "<script>window.location.href='page-login.php';</script>";
?>
<?php 
session_start();
unset($_SESSION['email']);
unset($_SESSION['fullname']);
unset($_SESSION['address']);
unset($_SESSION['iduser']);
unset($_SESSION['Quyen']);

header("location:dangnhap.php");
exit();
 ?>
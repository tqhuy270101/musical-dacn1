<?php 
session_start();
 $conn =mysqli_connect("localhost","root","","demo");

if (isset($_POST['top'])) { 
	$toppings = $_POST['top'];
	$stt=0;
	$_SESSION['value'] = array(); 
		foreach ($toppings as $key => $value) {
		$_SESSION['value'][$stt]= $value; 
		$stt++;
	if (isset($_POST['thanhtoan'])) {
 $sql = "INSERT INTO thanhtoan(name,email,soluong,userid,idsp) VALUES ('".$_SESSION['fullname']."','".$_SESSION['email']."','".$_SESSION['sl'][$value]."','".$_SESSION['iduser']."','$value')";
   $ketqua = mysqli_query($conn, $sql);
   echo $_SESSION['sl'][$value];
header('location:hinhthucthanhtoan.php?id='.$_SESSION['iduser'].'');
	}
if(isset($_POST['updatecart'])){
	$sql = "DELETE FROM giohang WHERE id=$value";
    $ketqua = mysqli_query($conn,$sql);
    header('location:giohang.php?id='.$_SESSION['iduser'].'');
} 


	}
	}
	

 ?>


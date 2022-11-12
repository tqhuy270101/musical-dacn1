<?php 
	$conn = mysqli_connect("localhost","root","","demo");
    $sql = "DELETE FROM giohang WHERE id=".$_GET['id'];
    $ketqua = mysqli_query($conn,$sql);
    header("location: trangchu.php");
 ?>
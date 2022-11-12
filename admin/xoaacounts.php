<?php 
    session_start();
    if (!isset($_SESSION['email']) ) {
        header("location: ../dangnhap.php");
    }
    if ($_SESSION['Quyen'] != 'admin'){
        header("location: ../trangchu.php");

    }
 ?>
<?php 
	$conn = mysqli_connect("localhost", "root", "", "demo");
	$sql = "DELETE FROM users WHERE id=".$_GET['id'];
	$ketqua = mysqli_query($conn, $sql);
	header("location:accounts.php?id=32");

	 ?>
<?php
	if(ISSET($_POST['btn_update'])){
	
		$image_name = $_FILES['img']['name'];
		$image_temp = $_FILES['file']['tmp_name'];
	
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		if(!is_dir("./upload"))
			mkdir("upload");
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");
		if(in_array($end, $allowed_ext)){
			if(unlink($previous)){
				if(move_uploaded_file($image_temp, $path)){
                    $conn = mysqli_connect("localhost","root","","demo");
                    $idd = $_SESSION['iduser'];
					mysqli_query($conn, "UPDATE `user` set  'img' = '$path' WHERE id = $idd") or die(mysqli_error());
					echo "<script>alert('User account updated!')</script>";
					header("location: hoso.php");
				}
			}		
		}else{
			echo "<script>alert('Image only')</script>";
		}
	}
?>


<?php session_start();  ?>

 <?php 
 $conn =mysqli_connect("localhost","root","","demo");
 $sql = "SELECT * FROM giohang where idnguoidung=".$_SESSION['iduser'];
  $ketqua = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($ketqua);
                            
 if (isset($_POST['submit'])) {
 		  $hinhthuc = $_POST['hinhthuc'];
      $soluong = $_POST['soluong']; 
      $sql2 = "UPDATE thanhtoan set  hinhthuc='$hinhthuc',trangthai='waiting' where userid='".$_SESSION['iduser']."'";
      $ketqua2= mysqli_query($conn,$sql2);
       foreach ($_SESSION['value'] as $key) {
         $sql3 = "DELETE FROM giohang where id = ".$key;
         $ketqua3= mysqli_query($conn,$sql3);
         echo $key;
       }
      header('location:lichsu-thanhtoan.php?id='.$_SESSION['iduser'].'');
    }

    ?>

<?php 

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
 echo $sql;
   $ketqua = mysqli_query($conn, $sql);
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



<!DOCTYPE html>
<html>
<head>
	<title>Hình thức thanh toán</title>
</head>
<body>
<?php include("menu.php") ?>

<?php 
 $conn = mysqli_connect("localhost","root","","demo");
 $sql = "SELECT *FROM users WHERE id =".$_SESSION['iduser'];
        $ketqua = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($ketqua))//cau lenh chen vao thanh toan o dau nhi
        {  
        	echo'<br><br>';
        	echo'<p><button  style="color:red">Thông tin khách hàng</button>';
        	echo'<div id="abc" style="border: solid 1px; padding: 20px; background: #ddd;text-align:center"> 
            <span style="color:red">Họ và tên:</span><span>'.$row['fullname'].'</span>
            <p></p>
             <span style="color:red">Số điện thoại:</span><span>'.$row['phone'].'</span>
             <p></p>
            <p ><span style="color:red">Địa chỉ:</span><span> '.$row['address'].' / '.$row['city'].'</p>
            <p ><span style="color:red">Phí vận chuyển:</span><span>20.000<sup>đ</sup></p>

             <div class="panel-body">
		    <form method="post" >
		   <p> <input type="radio" name="hinhthuc" value="NH" checked="checked"> Thanh toán khi nhận hàng</p>
		   <p>  <input type="radio" name="hinhthuc" value="Internet Banking"> Internet Banking <p>
		   <p>  <input type="radio" name="hinhthuc" value="Debit / Credit card"> Debit / Credit card <br /><br />
		     <input type="submit" value="submit" name="submit" class="btn btn-primary">
		    	

	    </form>		
	</div>
         	</div>';
      }
 ?>




<script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#abc").toggle(function(){;});
        })
    })
</script>
</body>
</html>


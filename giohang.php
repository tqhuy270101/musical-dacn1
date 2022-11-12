<?php 
session_start();
  $conn = mysqli_connect("localhost","root","","demo");
  if (isset($_POST['xoa'])) {
  $sql = "DELETE FROM giohang WHERE id=".$_GET['id'];
  $ketqua = mysqli_query($conn,$sql);  
      header("trangchu.php");
  }
 ?>

<?php 
if(isset($_POST['updateship']))
  {
    $city=$_POST['city'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $ketqua=mysqli_query($conn,"update users set city='$city',address='$address',phone='$phone' where id='".$_SESSION['iduser']."'");
    if($ketqua)
    {
echo "<script>alert('Địa chỉ thanh toán đã cập nhật!');</script>";
    }
  }

   if (isset($_POST['thanhtoan'])) {
header('location:hinhthucthanhtoan.php?id='.$_SESSION['iduser'].'');
}
 ?>

<?php 
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
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
      Welcome to FlatShop
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
</script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
</script>
<![endif]-->
  </head>
  <body>
 <?php include("menu.php") ?>

    <div class="wrapper">
      
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title">
                Shopping Cart
              </h3>
              <div class="clearfix">
              </div>
                <form method="POST">
              <table class="shop-table">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      Hình Ảnh
                    </th>
                    <th>
                      Chi tiết sản phẩm
                    </th>
                   
                    <th>
                      Số lượng
                    </th>
                    <th>
                      Đơn giá
                    </th>
                    <th>
                      Delete
                    </th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php
                $soluongmoi=0;
                $sql = "SELECT * FROM giohang where idnguoidung=".$_GET['id'];
                $ketqua = mysqli_query($conn, $sql);
                $tongtien=0;
                $_SESSION['sl'] = array();
                while ($row = mysqli_fetch_assoc($ketqua)) {
                  $_SESSION['idsp']= $row['id'];
                  $_SESSION['sl'][$row['id']] = $row['soluong'];
                  $number = $row['dongia'];
                  $a = number_format($number,3,'.','.');
                  $b = number_format($number*$row['soluong'],3,'.','.');
                  $c =  $number * $row['soluong'];
                  $tongtien += $c; 
                  $d = number_format($tongtien,3,'.','.');
            

                 $sql1 = "SELECT * FROM hanghoa where id=".$row['id'];
                 $ketqua1 = mysqli_query($conn, $sql1);
                 $row1 = mysqli_fetch_assoc($ketqua1);
            echo'
                  <tr>
                  <td>
                  <input type="checkbox" name=top[] value="'.$_SESSION['idsp'].'"> 
                  </td>
                    <td>
                      <img src="'.$row['img'].'" alt="">
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">
                          '.$row['tenhang'].'
                        </div>
                        <p>
                          <img alt="" src="images/star.png">
                          <a class="review_num" href="#">
                            02 Review(s)
                          </a>
                        </p>
                        
                        <p>
                         Code :
                          <strong class="pcode">
                          No
                            </strong>
                        </p>
                      </div>
                    </td>
                    
                    <td>
                   
                      <input style="width:70px" type="number" name="soluong" value="'.$row['soluong'].'">
                      
                    </td>
                    <td>
                      <h5>
                        <strong class="red">
                          '.$a.' 
                        </strong>
                      </h5>
                    </td>
                    <td>
                      <a href="xoagiohang.php?id='.$row['id'].'" name="xoa">
                      Delete
                      </a>
                    </td>
                  </tr>
                </tbody>';
               $soluongmoi = $row1['soluong'] - $row['soluong'];
                 $sql2 = "UPDATE hanghoa SET soluong='$soluongmoi' where id=".$row['id'];
                  $ketqua2 = mysqli_query($conn, $sql2);
                }
                 ?>

                <tfoot>
                  <tr>
                    <td colspan="6">
                      <button class="pull-left">
                        Update Cart
                      </button>
                      <button name="updatecart" class=" pull-right">
                        Delele for checkbox
                      </button>
                    </td>
                  </tr>
                </tfoot>

              </table>
              <div class="clearfix">
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <h5>
                      Địa chỉ giao hàng 
                    </h5>
                     <?php  
                     $sql = "SELECT * FROM users where id=".$_GET['id'];
                     $ketqua = mysqli_query($conn,$sql);
                     $row = mysqli_fetch_assoc($ketqua);
                     
                     echo'
                    <form method="POST">
                      <label>
                        Nhập thành phố *
                      </label>
                      <select class="" name="city">
                        <option value="DN">
                          Đà Nẵng
                        </option>
                        <option value="HCM">
                          Hồ Chí Minh
                        </option>
                        <option value="HN">
                          Hà Nội
                        </option>
                        <option value="NN">
                          Nước Ngoài
                        </option>
                        
                      </select>
                  
                      <label>
                        Quân / Huyện /Số nhà / Đường (Địa chỉ cụ thể) *
                      </label>
                      <input type="text" name="address" value="'.$row['address'].' / '.$row['city'].'" required="">
                      </select>
                      <label>
                        Phone *
                      </label>
                      <input type="text" name="phone" value="'.$row['phone'].'" required="">
                      <div class="clearfix">
                      </div>
                      <button type="submit" name="updateship">
                        Get A Qoute
                      </button>
                    </form>';
                         ?>
                  </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                    <h5>
                      Nhập mã giảm giá:
                    </h5>
                    <form>
                      <label>
                    Nhập mã phiếu giảm giá của bạn nếu bạn có
                      </label>
                      <input type="text" name="">
                      <div class="clearfix">
                      </div>
                      <button>
                        Get Code
                      </button>
                    </form>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="shippingbox">
                   
                   <?php
                         if(!isset($d)){
                        echo'  <div class="grandtotal">
                      <h5>
                        Tổng Tiền 
                      </h5>
                      <span>
                        0<sup>đ</sup>
                      </span>
                    </div>
                  
                   <input type="submit" name="thanhtoan" value="Thanh Toán" class="btn btn-primary">
                   </form>
                   ';
                        }
                        else{
                          echo'
                        
                   
                    <div class="grandtotal">
                      <h5>
                        Tổng Tiền 
                      </h5>
                      <span>
                        '.$d.'<sup>đ</sup>
                      </span>
                    </div>
                  
                   <input type="submit" name="thanhtoan" value="Thanh Toán" class="btn btn-primary">
                   </form>
                   ';
                        }

                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
        </div>
      </div>
      <div class="clearfix">
      </div>
      
    </div>
    <?php include("footer.php") ?>
    <!-- Bootstrap core JavaScript==================================================-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
  </body>
</html>

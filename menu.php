
  
<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="images/favicon.png">
      <title>Welcome to FlatShop</title>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
      <link href="css/sequence-looptheme.css" rel="stylesheet" media="all"/>
      <link href="css/style.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
       
<body>
<div class="wrapper">
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-md-2 col-sm-2">
                     <div class="logo"><a href="trangchu.php"><img src="images/logo.png" alt="FlatShop"></a></div>
                  </div>
                  <div class="col-md-10 col-sm-10">
                     <div class="header_top">
                        <div class="row">
                           <div class="col-md-3">
                              <ul class="option_nav">
                             
                              </ul>
                           </div>
                           <div class="col-md-6">
                              
                           </div>
                           <div class="col-md-3">
                              <ul class="usermenu">

                               <?php
                                 if(!isset($_SESSION)) 
                                 { 
                                       session_start(); 
                                 }                             
                                 if(!isset($_SESSION['email'])){
                                    echo '
                                    <li><a href="dangnhap.php" class="log">Đăng nhập</a></li>
                                    <li><a href="dangky.php" class="reg">Đăng ký</a></li>';
                                 }
                                 else {
                                    echo '<div class="btn-group">
                                    <button type="button"  class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                       '.$_SESSION['email'].'<img style="margin-left:20px" src="./images/dropdown.png">
                                    </button>
                                    <ul class="dropdown-menu">
                                       <li><p style="font-size:20px" class="dropdown-item">&nbsp;&nbsp;'.$_SESSION['fullname'].'</p></li><br><br>
                                       <li><a class="dropdown-item" href="hoso.php">Hồ sơ của tôi</a></li>
                                       <li><a class="dropdown-item" href="lichsu-thanhtoan.php?id='.$_SESSION['iduser'].'">Đơn hàng của bạn</a></li>
                                       <li><a class="dropdown-item" href="dangxuat.php">Đăng xuất</a></li>
                                    </ul>
                                    </div>';
                                 }
                                 ?>
                              </ul>
                           </div>
                        </div>
                     </div>


                     <div class="clearfix"></div>
                     <div class="header_bottom">
                        <ul class="option">
                           <li id="search" class="search">
                              <form action="search.php" method="GET">
                                <button class="search-submit"></button>
                              <input class="search-input" placeholder="Enter để tìm kiếm.." type="text"  name="search">
                              </form>
                           </li>

                           <?php 
                              $stt1 =0;
                              if (isset($_SESSION['email'])){
                                 $conn = mysqli_connect("localhost","root","","demo");
                                 $sql = "SELECT * FROM giohang where idnguoidung=".$_SESSION['iduser'];
                                 $ketqua = mysqli_query($conn, $sql);
                                 while ($row = mysqli_fetch_assoc($ketqua)) {
                                    $stt1++;
                                 }
                                 echo'<li class="option-cart">
                                 <a href="giohang.php?id='.$_SESSION['iduser'].'" class="cart-icon">cart <span class="cart_no">'.$stt1.'</span></a>';
                              }
                           ?>
                           <ul class="option-cart-item">

                           <?php 
                            $conn1 = mysqli_connect("localhost","root","","demo");
                            if ($_SESSION['email']) {
                              $sql1 = "SELECT * FROM giohang where idnguoidung=".$_SESSION['iduser'];
                              $ketqua1 = mysqli_query($conn1, $sql1);
                            
                              while ($row1 = mysqli_fetch_assoc($ketqua1)) {
                                 $tongtien =0;

                                 $number = $row1['dongia'] * $row1['soluong'];
                               
                                 $tongtien += $number;
                                 $tongtien1 = number_format($tongtien,3,'.','.');

                                       echo'<div class="cart-item">
                                      <div class="image"><img src="'.$row1['img'].'" alt=""></div>
                                      <div class="item-description">
                                         <a href="thongtinsp.php?id='.$row1['id'].'" class="name">'.$row1['tenhang'].'</a>
                                         <p>Size: <span class="light-red">One size</span><br>Số lượng: <span class="light-red">'.$row1['soluong'].'</span></p>
                                      </div>
                                      <div class="right">
                                         <p  class="price">'.$number.'</p>
                                         <a href="xoagiohang.php?id='.$row1['id'].'" class="remove"><img src="images/remove.png" alt="remove"></a>
                                      </div>
                                   </div>
                                ';
                               }
                            }
                            
                              ?>

                           <?php  
                              if (isset($tongtien1)){
                                 echo' <li><span class="total">Tổng: <strong>'.$tongtien1.' VND</strong></span></li>';
                              }
                              if (!isset($tongtien1)) {
                                 echo'Không có sản phẩm nào trong giỏ hàng.<br>';
                                 echo' Mua ngay !!';
                                 echo' <li><span class="total">Tổng: <strong> 0.000 VND</strong></span></li>';
  
                              }                       
                           ?>
                              </ul>
                           </li>
                        </ul>
                        <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                        <div class="navbar-collapse collapse">
                           <ul class="nav navbar-nav">
                              <li>
                                 <a href="trangchu.php">Trang chủ</a>
                              </li>
                              <?php 
    $conn = mysqli_connect("localhost","root","","demo");
    $sql = "SELECT * FROM danhmuc";
    $ketqua = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($ketqua)) {
        echo'<li> <a href="sanpham.php?id='.$row['id'].'">'.$row['tendanhmuc']. '</a></li>';

    }
   ?>
                              
                              
                              <li><a href="contact.php">LIÊN HỆ</a></li>
                              <li><a href="blog.php">TIN TỨC</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
</div>
</div>
</div>

  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
     
</body>
</html>

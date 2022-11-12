<div class="wrapper">
   <div class="header">
      <div class="container">
         <div class="row">
            <div class="col-md-2 col-sm-2">
               <div class="logo"><a href="home.php"><img src="../images/logo.png" alt="FlatShop"></a></div>
            </div>
            <div class="col-md-10 col-sm-10">
               <div class="header_top">
                  <div class="row">
                     <div class="col-md-3">
                        <ul class="usermenu">
                           <?php
                           session_start();                              
                           if(empty($_SESSION['email_user'])){
                              echo '
                              <li><a href="dangnhap.php" class="log">Đăng nhập</a></li>
                              <li><a href="dangky.php" class="reg">Đăng ký</a></li>';
                           }
                           else {
                        ?>
                              <div class="btn-group">
                              <button type="button"  class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                                 <?php echo $_SESSION['email_user']; ?><img style="margin-left:20px" src="../images/dropdown.png">
                              </button>
                              <ul class="dropdown-menu">
                                 <li><p style="font-size:20px" class="dropdown-item">&nbsp;&nbsp;<?php echo $_SESSION['email_user'] ?></p></li><br><br>
                                 <li><a class="dropdown-item" href="hoso.php">Hồ sơ của tôi</a></li>
                                 <li><a class="dropdown-item" href="lichsu-thanhtoan.php?id=<?php echo $_SESSION['id_user']  ?>">Đơn hàng của bạn</a></li>
                                 <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                              </ul>
                              </div>
                              <?php
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
                     if (isset($_SESSION['email_user'])){
                      ?>
                        <li class="option-cart">
                        <a href="giohang.php?id='.$_SESSION['id_user'].'" class="cart-icon">cart <span class="cart_no">0</span></a>
                     <?php
                     }
                  ?>
                  <ul class="option-cart-item">

                  <?php 
                     if ($_SESSION['email_user']) {
                    
                  ?>
                              <div class="cart-item">
                              <div class="image"><img src="'.$row1['img'].'" alt=""></div>
                              <div class="item-description">
                                 <a href="thongtinsp.php?id='.$row1['id'].'" class="name">Tên hàng</a>
                                 <p>Size: <span class="light-red">One size</span><br>Số lượng: <span class="light-red">Số lượng</span></p>
                              </div>
                              <div class="right">
                                 <p  class="price">500000</p>
                                 <a href="xoagiohang.php?id=1" class="remove"><img src="../images/remove.png" alt="remove"></a>
                              </div>
                           </div>
                     
                        <?php
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
                        <a href="home.php">Trang chủ</a>
                     </li>
                     <li><a href="#">Đàn</a></li>
                     <li><a href="#">Trống</a></li>                           
                     <li><a href="#">LIÊN HỆ</a></li>
                     <li><a href="#">TIN TỨC</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


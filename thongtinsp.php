<?php session_start();  ?>
 <?php 
 $conn =mysqli_connect("localhost","root","","demo");
 if (isset($_POST['add'])) {
  $soluong = $_POST['soluong'];
  $id = $_GET['id'];
    $sql = "SELECT * FROM hanghoa WHERE id= $id";
    $ketqua= mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($ketqua)) {
        $tenhang = $row['tenhang'];
        $dongia = $row['dongia'];
        $img = $row['img'];
        $id = $row['id'];

     }    
        
     $sql1 = "SELECT *FROM giohang WHERE id=$id and idnguoidung =".$_SESSION['iduser'];
     $ketqua1 = mysqli_query($conn, $sql1);
     while ($row = mysqli_fetch_assoc($ketqua1)) {
      $sl = $row['soluong'] + $soluong;
      $idgiohang = $row['id'];
      echo $sl;

     }
     if(mysqli_num_rows($ketqua1)>0){
      if ($idgiohang == $id) {
        $sql3 = "UPDATE giohang SET soluong= '$sl' WHERE id=".$_GET['id'];
        $ketqua3 = mysqli_query($conn, $sql3);
        echo'<script>
        function myFunction() {
        alert("Đã thêm vào giỏ hàng thành công!");
        }
        </script>';
      }
    }
    else{
      if($soluong > 0){            
        $idnguoidung= $_SESSION['iduser'];
        $sql2 = "INSERT INTO giohang(id,tenhang,dongia,soluong,img,idnguoidung) VALUES ('$id','$tenhang','$dongia','$soluong','$img','$idnguoidung')";
      $ketqua2= mysqli_query($conn,$sql2);
        echo'<script>
        function myFunction() {
        alert("Đã thêm vào giỏ hàng thành công!");
        }
        </script>';
        } else {
            echo'<script>
        function myFunction() {
        alert("Số lượng không thể bé hơn 1!");
        }
        </script>';
        }
      

    } 
  
if (!isset($_SESSION['email'])) {
    echo '<script>';
    echo"alert('Bạn vui lòng đăng nhập để mua hàng!')";
    echo'</script>';
    header("location:dangnhap.php");
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

<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  </head>
  <body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
            $("#guibinhluan").click(function () {
                var url_string =  window.location.href;
                var url = new URL(url_string);
                var name = '<?php echo $_SESSION['fullname'] ?>';
                var id = url.searchParams.get("id");
                var txt = $("#noidungbinhluan").val();
                var rate = 0;
                if (document.getElementById('r1').checked) {
                  rate = document.getElementById('r1').value;
                }
                else if (document.getElementById('r2').checked) {
                  rate = document.getElementById('r2').value;
                }
                else if (document.getElementById('r3').checked) {
                  rate = document.getElementById('r3').value;
                }
                else if (document.getElementById('r4').checked) {
                  rate = document.getElementById('r4').value;
                }
                else if (document.getElementById('r5').checked) {
                  rate = document.getElementById('r5').value;
                }
                var userid =<?php echo $_SESSION['iduser'] ?>;
                $.post("xulybinhluan.php", {content: txt,idbook: id,iduser: userid, rate:rate},function(result){
                  $("#dsbinhluan").append('<hr><div style="margin-left: 100px"><br><br><h5 style="color:red">' +name+ '</h5>'+"<p>"+rate+" Star</p>"+"<p>"+txt+"<p><br><br></div>");
                });
              });
            ;
    });
  </script>
  	<?php include("menu.php") ?>
    <div class="wrapper">
      <div class="header">
        
        <div class="clearfix">
        </div>
        <div class="page-index">
          <div class="container">
          	<?php 
            $id = $_GET['id'];
            $conn = mysqli_connect("localhost","root","","demo");
            $sql = "SELECT * FROM hanghoa where id= $id";
            $ketqua = mysqli_query($conn,$sql);
            echo'<p>
            Thông tin sản phẩm
            </p>';
            ?>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="products-details">
              <?php
              $sql = "SELECT * FROM hanghoa where id=$id";
            	$ketqua = mysqli_query($conn,$sql);
             	while ($row = mysqli_fetch_assoc($ketqua)) {
    					$number = $row['dongia'];
    					$dongia = number_format($number,3,'.','.');
    					echo'
                <div class="preview_image">
                  <div class="preview-small">
  <img style="width:300px;height:375px" id="zoom_03" src="'.$row['img'].'" data-zoom-image="'.$row['img'].'" alt="">
                  </div>   
                </div>
 <div class="products-description">
                  <h2 class="name">'.$row['tenhang'].'</h2>
                  <p><img alt="" src="images/star.png"></p>
                  <p>
                    Kho: <span class=" light-red">'.$row['soluong'].'</span>
                  </p>
                  <p>
                  Phí vận chuyển: -Trong tỉnh :<span style="color:green"> 10.000đ - 40.000đ</span>
                  </p>
                  <p>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                  -Ngoại tỉnh :<span style="color:green"> 10.000đ - 40.000đ </span>
                  </p>
                 
                  <hr class="border">
                  <div class="price">
                    Giá :  <span class="new_price">'.$dongia.'<sup>đ</sup></span>
                  </div>
                <form method="POST">
                    <hr class="border">
                    <div class="wided">
                      <div class="qty">
                        Số lượng: &nbsp;&nbsp;: 
                        <input style="width: 100px" type="number" value="1" name="soluong">
                      </div>

                      <div class="button_group">
                        <button onclick="myFunction()" class="button" name="add">
                          Add To Cart
                        </button>

                </form>

                      <button class="button favorite">
                        <i class="fa fa-heart-o"></i>
                      </button>
                      <button class="button favorite">
                        <i class="fa fa-envelope-o"></i>
                      </button>
                    </div>
                  </div>
                  <div class="clearfix">
                  </div>
                  <hr class="border">
                  <img src="images/share.png" alt="" class="pull-right">
                </div>
                ';

                  }

                	?>

              </div>
              <div class="clearfix">
              </div>
              <div class="tab-box">
                <div id="tabnav">
                  <ul>
                    <li>
                      <a href="#Descraption">
                        Mô tả
                      </a>
                    </li>
                    <li>
                      <a href="#Reviews">
                        Đánh giá
                      </a>
                    </li>               
                  </ul>
                </div>
                <div class="tab-content-wrap">
                  <div class="tab-content" id="Descraption">
                    <p>
                     + Khi nhận hàng từ shipper, bạn có thể gọi điện thoại cho shop để shop xác nhận với shipper cho kiểm tra hàng ( vì quy định của shopee không cho kiểm tra ). Khi bạn kiểm tra lúc nhận hàng, nếu không đúng mẫu, hoặc có vấn đề gì thì bạn lập biên bản với shipper. Hoặc quay video lúc khui hàng ( nhìn rõ mã đơn hàng, quay từ lúc bắt đầu khui )
                    </p>
                    <p>
                      + Nếu các bạn không lập được biên bản, quay clip lúc nhận hàng shop chỉ hỗ trợ bảo hành...
                    </p>
                    <p>Bảo hành MIỄN PHÍ TẠI shop</p>
                    <p>CÁC BẠN ƠI! khi nhận được hàng, nếu có vấn đề gọi điện cho shop để giải quyết liền nhé, shop hứa không làm các bạn thất vọng. Những bạn không gọi mà vội đánh giá 1* shop xin không giải quyết. Khi hàng lỡ may bị vỡ các bạn bấm hoàn trả sẽ có nhân viên giao hàng hoàn lại tiền cho các bạn nhé!</p>
                  </div>
                  <div class="tab-content"  id="Reviews">

                       <form method="POST">

                    	<table style="border: none;border-top-style: none; ">
                    	<tr>
                            <th>
                            	<input type="radio" name="star" value="1" id="r1">&nbsp;&nbsp;
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                            </th>
                            <th>
                            	<input type="radio" name="star" value="2" id="r2">&nbsp;&nbsp;
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                            </th>
                            <th>
                            	<input type="radio" name="star" value="3" id="r3">&nbsp;&nbsp;
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                            </th>
                            <th>
                            	<input type="radio" name="star" value="4" id="r4">&nbsp;&nbsp;
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                            </th>
                            <th>
                            	<input type="radio" name="star" value="5" id="r5">&nbsp;&nbsp;
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                              <i style="font-size: 20px;color: yellow" class="fa fa-star"></i>
                            </th>
                          </tr>
                          </table>
                          </form>
                      <div class="row">
                            <div class="col-sm-6 col-md-6">
                            <?php 
                        if (isset($_SESSION['email'])) {
                             echo'<p >Tên khách hàng: <span style="color:red"> '.$_SESSION['fullname'].'<span> </p>';}
                        else echo'<p >Tên khách hàng: <span style="color:red"> Vui lòng đăng nhập<span> </p>';
                               ?>  

							</div>
                        <div class="col-sm-6 col-md-6">
                          <div class="form-row">
                            <label class="lebel-abs">
                              Bình luận
                              <strong class="red">
                                *
                              </strong>

                            </label>
                            <textarea class="input textareafild" name="noidungbinhluan" id="noidungbinhluan" rows="7" ></textarea>
                          </div>
                          <div class="form-row">
                            <input  value="Bình luận" id="guibinhluan" type="submit" class="button">
                          </div>

                        </div>


      <?php 
        $sql = "SELECT *FROM binhluan WHERE idsach = $id";
        $ketqua1 = mysqli_query($conn, $sql);
        while($dong = mysqli_fetch_assoc($ketqua1))
        {  
          $iduser = $dong['idnguoidung'];
          $star = $dong['star'];
          $sql1 = "SELECT *FROM users WHERE  id = $iduser";
          $ketqua2 = mysqli_query($conn, $sql1);
          $dong1 = mysqli_fetch_assoc($ketqua2);
          
          $name = $dong1['fullname'];
          $reply= $dong['reply'];//chay code xem 
          $date = $dong['date'];
          echo'<hr>';
          echo'<div style="margin-left: 100px">';
          echo'<br><br><h5 style="color:red">'.$name.'  : <span style="color:ffcc00"> '.$star.'Star</span> </h5>';
          echo'<br>';
          echo'<span>&nbsp;&nbsp;&nbsp;'.$date.'</span><br>';
          echo'<br>';

          echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;".$dong['noidung']."<p>";
          echo'<p><button style="color:blue"><u>Trả lời</u></button>';
         
          echo'<div id="abc" style="border: solid 1px; margin-left:70px;padding: 2px; background: #ddd;">
            <h6 style="color:red">Tác giả:</h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$dong['reply'].'</div>
          &nbsp;&nbsp;&nbsp;&nbsp;<br><br></div>';
         }
           

       ?>
         <div id="dsbinhluan"></div>
                      </div>
                  </div>                          
                </div>
            </div>        
          </div>
        </div>
      </div>
    </div>

    <?php include("footer.php") ?>
    <!-- Bootstrap core JavaScript==================================================-->
 
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#abc").toggle();
  });
});
</script>

    <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src='js/jquery.elevatezoom.js'>
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
  </body>
</html>





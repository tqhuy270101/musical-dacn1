

<!DOCTYPE html>
<html>
<head>
	<title>Lịch sử đặt hàng</title>

</head>
	<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Order History</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/stylett.css">
	
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
                Lịch sử Đặt hàng
              </h3>
              <div class="clearfix">
              </div>
              <table class="shop-table">
                <thead>
                  <tr>
                  
                    <th>
                      Hình ảnh
                    </th>
                    <th>
                      Tên sản phẩm
                    </th>
                    <th>
                      Số lượng
                    </th>
                    <th>
                      Đơn giá
                    </th>
                    <th>
                      Hình thức thanh toán
                    </th>
                    <th>
                      Ngày đặt
                    </th>
                    <th>
                      Aciton
                    </th>
                  </tr>

                  	
                </thead>
                <tbody>
                    
                <?php 

              		$iduser = $_SESSION['iduser'];
              		$i = 0;
                    $ketqua = mysqli_query($conn, "select hanghoa.img as pimg ,hanghoa.tenhang as pname,thanhtoan.soluong as psoluong, hanghoa.dongia as pdongia, thanhtoan.hinhthuc as phinhthuc,thanhtoan.trangthai as ptinhtrang ,thanhtoan.date as pdate ,thanhtoan.id as pid, thanhtoan.userid,thanhtoan.ghichu as pghichu from thanhtoan join hanghoa on thanhtoan.idsp=hanghoa.id where userid=$iduser");
				while($row=mysqli_fetch_array($ketqua))          { $i++;  
					$number = $row['pdongia'];
					$pric = $row['pdongia']*$row['psoluong'];
				    $price = number_format($pric,3,'.','.');
                   	?>
              
                 <tr>
					<td>
						<a  href="#">
						    <img src="<?php echo $row['pimg'];?>" alt="" width="84" height="146">
						</a>
					</td>
					<td>
						<h4 ><a href="">
						<?php echo $row['pname'];?></a></h4>
					</td>
					<td>
						<?php echo $soluong=$row['psoluong']; ?>   
		            </td>
					<td ><?php echo $price; ?> VND  </td>
					<td ><?php echo $trangthai=$row['ptinhtrang']; ?>  </td>

					<td><?php echo $row['pdate']; ?>  </td>
					
					<td>
<a class="login-window" href="#track<?=$i ?>">Track</a>	</td> 
<br>
<div style="text-align: center;" class="login" id="track<?=$i ?>">
	<p></p>
	<h5 style="text-align: center;">Chi tiết theo dõi đơn hàng</h5>
	<p></p>
<p style="text-align: center;">ID đặt đơn hàng: 
	<?php echo $row['pid'];?></p>
	<p style="text-align: center;">Số lượng: 
	<?php echo $row['psoluong'];?></p>
	<p style="text-align: center;">Đơn giá: 
	<?php echo $price;?> VND</p>
	<p style="text-align: center;">Tình trạng đơn hàng: 
	<?php echo $row['ptinhtrang'];?></p>
	<p style="text-align: center;">Ghi chú: 
	<?php echo $row['pghichu'];?></p>
				</tr>
<?php $cnt=0;}
                 
              
                
                 ?>


</div>
               
  </tbody>
              </table>
              <div class="clearfix">
              </div>
              
          
          
        </div>
      </div>
      </div>
      
    </div>
    <br><br><br>
              <?php include("footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
    $('a.login-window').click(function() {
        var loginBox = $(this).attr('href');
         $(loginBox).fadeIn(300);
         $('body').append('<div id="over">');
        $('#over').fadeIn(300);
 
        return false;
 });
  $(document).on('click', "a.close, #over", function() {
       $('#over, .login').fadeOut(300 , function() {
           $('#over').remove();
       });
      return false;
 });
});
	</script>
</body>
</html>
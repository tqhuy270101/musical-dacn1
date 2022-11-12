<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	
</head>

<body>
<?php include('menu.php')?>
            <div class="container">
               <li>
                   <div class="row">
                   	            <div class="col-md-3">
                   	            	 <div class="category leftbar">
                <h3 class="title">
                  DANH MỤC
                </h3>
                <ul>
                  <?php 
                  $sql = "SELECT * FROM danhmuc";
                  $ketqua = mysqli_query($conn, $sql);
                   while ($row = mysqli_fetch_assoc($ketqua)) {
                    
                   echo'<li> <a href="sanpham.php?id='.$row['id'].'">'.$row['tendanhmuc']. '</a></li>';

                 }
                   ?>
                </ul>
              </div>
          </div>
            <div class="col-md-9">
 			<?php
 			$timkiem =  '';
 			$gia = '';
		if (isset($_GET['timkiem'])) {
			$timkiem = $_GET['timkiem'];
			$min = $_GET['min'];
      $max = $_GET['max'];
		}
		$conn = mysqli_connect("localhost","root","","demo");
		$sql="SELECT * from hanghoa where dongia between $min and $max ";
		$query=mysqli_query($conn,$sql);
		if(mysqli_num_rows($query) > 0)	
		{
			while($row=mysqli_fetch_assoc($query))
			{
          $number = $row['dongia'];
          $dongia = number_format($number,3,'.','.');
                 echo' 
                 <div class="col-md-4 col-sm-6">
                    <div class="products">
                      <div class="offer">
                        New
                      </div>
                      <div class="thumbnail">
                        <a href="thongtinsp.php?id='.$row['id'].'">
                          <img style="width:150px;height:220px" src="'.$row['img'].'" alt="Product Name">
                        </a>
                      </div>
                      <div class="productname">'.$row['tenhang'].'</div>
                      <h4 class="price">'.$dongia.'</h4>
                      <div class="button_group">
                        <button class="button add-cart" type="button">
                          Add To Cart
                        </button>
                        <button class="button compare" type="button">
                          <i class="fa fa-exchange">
                          </i>
                        </button>
                        <button class="button wishlist" type="button">
                          <i class="fa fa-heart-o">
                          </i>
                        </button>
                      </div>
                    </div>
                  </div>
                  ';
                     } 
                 }
                
            ?>
              </div>
                </li>
			      </div>

<?php include("footer.php") ?>
</body>
</html>
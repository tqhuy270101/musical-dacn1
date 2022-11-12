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
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      
<?php include("menu.php") ?>
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-3">

 <div class="others leftbar">
                                   <form  method="POST" class="pricing">
                    <div class="limiter">

                      Show : &nbsp;&nbsp; 
                      <?php  
                      if (isset($_SESSION['sosp']))
                       {
                         $limit = $_SESSION['sosp'];
                       }
                      else
                       {
                      $limit = 9;
                       }
                      if (isset($_POST['sosp'])) 
                      {
                        $limit = $_POST['sosp'];
                        $_SESSION['sosp'] = $limit;
                      
                      }

                      echo'<input type="text" name="sosp" placeholder="..." value="'.$limit.'" style="width: 60px">
                        <input style="margin-left: 20px" type="submit" value="Go">';
                      ?>
                    </div>  
                         
                              </form>

              </div>
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
              <div class="clearfix"></div>
              <div class="products-grid">
                <div class="toolbar">
                  <div class="sorter">
                        <form action="timkiem.php" method="GET" class="pricing">
                    <div class="sort-by">
                          Danh mục:
                           <select name="timkiem">
                        <option value="guitar" selected>
                          Guitar 
                        </option>
                        <option value="drum" >
                          Drum
                        </option>
                        <option value="Piano">
                          Piano
                        </option>
                        <option value="Violon">
                          Violon
                        </option>
                   </select>
                 </div>
                    <div class="sort-by">
                      Giá : 
                      <select name="min" >
                         <option value="0" selected>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- - -
                        </option>
                        <option value="1000" >
                          1.000.000 VND
                        </option>
                        <option value="3000">
                          3.000.000 VND
                        </option>
                        <option value="5000">
                          5.000.000 VND
                        </option>
                        <option value="8000">
                          8.000.000 VND
                        </option>
                        <option value="10000">
                          10.000.000 VND
                        </option>
                        <option value="12000">
                          20.000.000 VND 
                        </option>
                        <option value="100000">
                          30.000.000 VND
                        </option>
                      </select>
                        &nbsp;  - >
                      <select name="max" >
                         <option value="0" selected>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- - -
                        </option>
                        <option value="10000" >
                          10.000.000 VND
                        </option>
                        <option value="15000">
                          15.000.000 VND
                        </option>
                        <option value="20000">
                          20.000.000 VND 
                        </option>
                        <option value="30000">
                          30.000.000 VND
                        </option>
                        <option value="50000">
                          50.000.000 VND
                        </option>
                        <option value="80000">
                          80.000.000 VND
                        </option>
                        <option value="100000">
                          100.000.000 VND
                        </option>
                      </select>


                   

                      <input style="margin-left: 20px" type="submit" value="Go"> 
                     
                    </div>

                  </form>



                  </div>
                  
                </div>
                <div class="clearfix">
                </div>
                <div class="row">
                  
                  
                  
                  
                  
                <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'demo');
        $idd = $_GET['id'];
        $result = mysqli_query($conn, 'SELECT count(id) as total FROM hanghoa where iddanhmuc = '.$idd.'');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        if (isset($_SESSION['sosp'])) {
          $limit = $_SESSION['sosp'];
        }
        else{
        $limit = 9;
            }
        if (isset($_POST['sosp'])) {
          $limit = $_POST['sosp'];
          $_SESSION['sosp'] = $limit;
           }
        
       
        $total_page = ceil($total_records / $limit);
         if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }

        $start = ($current_page - 1) * $limit;
    $sql = "SELECT * FROM hanghoa WHERE iddanhmuc=$idd limit $start,$limit";
    $ketqua = mysqli_query($conn , $sql);
    while ($row = mysqli_fetch_assoc($ketqua)) {
          $number = $row['dongia'];
          $dongia = number_format($number,3,'.','.');
                 echo' <div class="col-md-4 col-sm-6">
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
                        <a href="thongtinsp.php?id='.$row['id'].'" class="button add-cart" type="button">
                          Mua ngay!
                        </a>
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
                  </div>';
                     }
                   ?>
                </div>
              

               
              
                <div class="toolbar">
                  <div  class="pager">
           <?php 
         
            if ($current_page > 1 && $total_page > 1)
            {
                echo' <a href="sanpham.php?id='.$idd.'&page='.($current_page-1).'" class="prev-page">
                      <i class="fa fa-angle-left">
                      </i>
                      </a>';
            }
            for ($i = 1; $i <= $total_page; $i++)
            {               
                if ( $i == $current_page)
                {
                  echo' <a href="sanpham.php?id='.$idd.'&page='.$i.'" class="active">'.$i.'</a>';
                }
                else
                {
                  echo' <a href="sanpham.php?id='.$idd.'&page='.$i.'" >'.$i.'</a>';
                }
            }
            if ($current_page < $total_page && $total_page > 1)
            {
                echo'<a href="sanpham.php?id='.$idd.'&page='.($current_page+1).'" class="next-page">
                      <i class="fa fa-angle-right">
                      </i>
                      </a>';
            }
           ?>
                 </div>
              </div>
            </div>
          </div>   
        </div>
      </div>
    </div>
    <?php include("footer.php") ?>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.sequence-min.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
  </body>
</html>
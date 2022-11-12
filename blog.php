<!DOCTYPE html>
<html>
   <head>
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

        <link rel="stylesheet" href="css/frontend/css/style.css">
        <link rel="stylesheet" href="css/frontend/css/style.scss">
        <link rel="stylesheet" href="css/frontend/css/about-us.css">
        <link rel="stylesheet" href="css/frontend/fontawesome/css/all.min.css">
   </head>
   <body id="home">
        <div class="wrapper">
            <!-- menu -->
            <?php 
                include("menu.php")
                
            ?>
            <!-- banner -->
            
            <div class="clearfix"></div>
                <div class="container_fullwidth">
                    
                    <div class="container">
                        <div class="row title-pages-aboutus">
                            <div class="jumbotron d-flex align-items-center">
                                <div class="container">
                                    <h1 class="display-4">Blog</h1>
                                </div>
                            </div>
                        </div><br><br>
                        <!-- list news -->
                        <div class="limiter">

                        <?php 
                        
                $conn = mysqli_connect('localhost', 'root', '', 'demo');
        
                $result = mysqli_query($conn, 'SELECT count(id) as total FROM news');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                if (isset($_SESSION['sosp'])) {
                $limit = $_SESSION['sosp'];
                }
                else{
                $limit = 6;
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
                $sql = "SELECT * FROM news limit $start,$limit";
                $ketqua = mysqli_query($conn , $sql);
                while ($row = mysqli_fetch_assoc($ketqua)) {
                   
                    echo' <div class="col-md-4 col-sm-6">
                        <div class="products">
                        <div class="offer">
                            New
                        </div>
                        <div class="thumbnail">
                            <a href="detailBlog.php?id='.$row['id'].'">
                            <img style="width:150px;height:220px" src="'.$row['image'].'" alt="Product Name">
                            </a>
                        </div>
                        
                        <h4 class="price">'.substr($row['title'],0, 15).'</h4>
                        <div class="productname">'.substr($row['content'],0, 150).'</div>
                            <div class="button_group">
                                <a href="detailBlog.php?id='.$row['id'].'" class="button add-cart" type="button">
                                Xem ngay !
                                </a>
                            </div>
                            <p>&nbsp</p>
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
                echo' <a href="detailBlog.php?page='.($current_page-1).'" class="prev-page">
                      <i class="fa fa-angle-left">
                      </i>
                      </a>';
            }
            for ($i = 1; $i <= $total_page; $i++)
            {               
                if ( $i == $current_page)
                {
                  echo' <a href="detailBlog.php?page='.$i.'" class="active">'.$i.'</a>';
                }
                else
                {
                  echo' <a href="detailBlog.php?page='.$i.'" >'.$i.'</a>';
                }
            }
            if ($current_page < $total_page && $total_page > 1)
            {
                echo'<a href="detailBlog.php?page='.($current_page+1).'" class="next-page">
                      <i class="fa fa-angle-right">
                      </i>
                      </a>';
            }
           ?>
                        <!--  -->



               
               
                            
                            </div>
                        </li>
                    </ul>
               </div>
               <br><br>
            </div>
         </div>
      </div>
      <?php include("footer.php") ?>
      <!-- Bootstrap core JavaScript==================================================-->
	  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	  <script type="text/javascript" src="js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="js/jquery.sequence-min.js"></script>
	  <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript" src="js/script.min.js" ></script>
   </body>
</html>
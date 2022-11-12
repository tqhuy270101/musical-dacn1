<?php 
    session_start();
    if (!isset($_SESSION['email']) ) {
        header("location: ../dangnhap.php");
    }
    if ($_SESSION['Quyen'] != 'admin'){
        header("location: ../trangchu.php");

    }
 ?>                               <?php 
if (isset($_POST['reply2'])) {
     $conn = mysqli_connect("localhost","root","","demo");  
         $reply = $_POST['reply1'];  
    $sql1 = " UPDATE binhluan SET reply='$reply' where id =".$_GET['id'];
    $ketqua = mysqli_query($conn, $sql1);
            echo '<script language="javascript">'; 
            echo 'alert("Đã trả lời !")'; 
            echo '</script>';
       
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php include("menu.php") ?>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
            	 <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                         <h2 class="tm-block-title d-inline-block">ID sản phẩm</h2>
                        <table class="table table-hover table-striped mt-3">
                            <tbody>
                            	<tr class="text-center" class="tm-bg-gray">
                                        <th scope="col">IDKH</th>
                                        <th scope="col" class="text-center">IDSP</th>

                                        

                                    </tr>
                          <?php 
            $conn = mysqli_connect("localhost","root","","demo");
            $sql = "SELECT *FROM binhluan";
            $ketqua = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($ketqua)) {
                             echo' 
                                <tr>
                                    
                                    <td><a href="reviews.php?id='.$row['id'].'">'.$row['noidung'].'</a></td>
                                    <td><a href="../thongtinsp.php?id='.$row['idsach'].'"</a>00000'.$row['idsach'].'</td>
                                </tr>
                                ';
                           
                          }
                                     ?>
                                      </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Bình luận của khách hàng</h2>

                            </div>
                            
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">Bình luận của khách hàng</th>
                                        <th scope="col" class="text-center">Trả lời bình luận</th>                                      
                                        <th scope="col">&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
                                	<form method="POST">
                <?php 
                $idd = $_GET['id'];
        $conn = mysqli_connect('localhost', 'root', '', 'demo');
        $result = mysqli_query($conn, 'SELECT count(id) as total FROM binhluan where id = '.$idd.'');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;       
        $limit = 9;   
        $total_page = ceil($total_records / $limit);
         if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }

        $start = ($current_page - 1) * $limit;

   		 $sql = "SELECT * FROM binhluan where id=$idd limit  $start,$limit";
	    $ketqua = mysqli_query($conn , $sql);
	    while ($row = mysqli_fetch_assoc($ketqua)) {
                                    echo'
                                    <tr>
                                        <td><a href="">'.$row['noidung'].'</a></td>
                                        <td><textarea rows="3" value="" type="text" name="reply1"></textarea </td>
                                        <td><button name="reply2">Reply</button></td>    
                                    </tr> 
                                    ';    
                                     }
                                   ?>
                                   </form>
                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row justify-content-end">
                           

                            </div>
                        <div class="tm-table-mt tm-table-actions-row justify-content-center" >

                            <div class="tm-table-actions-col">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                                    <ul class="pagination tm-pagination">

                                   <?php 

            if ($current_page > 1 && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="reviews.php?page='.($current_page-1).'" ><i class="fa fa-angle-left"></i></a> </li> ';}
            for ($i = 1; $i <= $total_page; $i++){
                if ( $i == $current_page){
                  echo' <li class="page-item active"><a  class="page-link"  href="reviews.php?page='.$i.'">'.$i.'</a></li>';
                }
                else{
                    echo '<li class="page-item"><a class="page-link" style="text-decoration:none" href="reviews.php?page='.$i.'">'.$i.'</a></li> ';
                }
            }
             if ($current_page < $total_page && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="reviews.php?page='.($current_page+1).'" ><i class="fa fa-angle-right"></i></a> </li> ';
            }
           ?>
       </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2020. Created by
                        <a href="#" class="text-white tm-footer-link">NguyenNhatCuong</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    
</body>

</html>


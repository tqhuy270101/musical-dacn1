<?php 
    session_start();
    if (!isset($_SESSION['email']) ) {
        header("location: ../dangnhap.php");
    }
    if ($_SESSION['Quyen'] != 'admin'){
        header("location: ../trangchu.php");

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
                <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Đơn hàng đã giao</h2>

                            </div>
                           
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col">ID Sản phẩm</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Ngày đặt</th>
                                        <th scope="col">Hình thức thanh toán</th>
                                        <th scope="col">Trạng thái</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>

                <?php 
                    $conn = mysqli_connect("localhost","root","","demo");

        $sql = "SELECT*from thanhtoan WHERE trangthai='delivered'";
       $ketqua = mysqli_query($conn,$sql);
  	  while ($row = mysqli_fetch_assoc($ketqua)) {

                                  echo'
                                    <tr>                      
                                     	<td>'.$row['name'].'</td>
                                        <td>'.$row['email'].'</td>
                                        <td>'.$row['idsp'].'</td>
                                        <td>'.$row['soluong'].'</td>
                                        <td>'.$row['date'].'</td>
                                        <td>'.$row['hinhthuc'].'</td>
                                        <td>'.$row['trangthai'].'</td>

                                       
                                        <td><a href="giao.php?id='.$row['id'].'" <i class="fas fa-edit"></i></a></td>    
                                    </tr>  ';
                                 }
      
                 ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row justify-content-end">
                            

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


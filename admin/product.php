<?php 
    session_start();
    if (!isset($_SESSION['email']) ) {
        header("location: ../dangnhap.php");
    }
    if ($_SESSION['Quyen'] != 'admin'){
        header("location: ../trangchu.php");

    }
 ?>
<?php
    $err="";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = mysqli_connect("localhost", "root", "", "demo");
        $tendanhmuc = $_POST['txttendanhmuc'];
        $sql1 = "SELECT * FROM danhmuc";
        $ketqua1 = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_assoc($ketqua1)) {
            if ($row['tendanhmuc'] == $tendanhmuc) {
                $a = $row['tendanhmuc'];
            }
        }
        if (empty($tendanhmuc)) {
            echo '<script language="javascript">'; 
            echo 'alert("Tên danh mục còn trống !")'; 
            echo '</script>';
        } elseif ($a == $tendanhmuc) {
            echo '<script language="javascript">'; 
            echo 'alert("Tên danh mục đã tồn tại !")'; 
            echo '</script>';
        } else {
            $sql = "INSERT INTO danhmuc(tendanhmuc) VALUES ('$tendanhmuc')";
            $ketqua = mysqli_query($conn, $sql);
            echo '<script language="javascript">'; 
            echo 'alert("Thêm thành công!")'; 
            header("refresh:0");
            echo '</script>';
        }
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
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Sản phẩm</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="themsanpham.php" class="btn btn-small btn-primary">Thêm sản phẩm</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col" class="text-center">Tồn kho</th>
                                        <th scope="col" class="text-center">Đơn giá</th>
                                        <th scope="col">Mã Sản Phẩm</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <form method="POST">

                <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'demo');
        $idd = $_GET['id'];
        $result = mysqli_query($conn, 'SELECT count(id) as total FROM hanghoa where iddanhmuc = '.$idd.'');
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

    $sql = "SELECT * FROM hanghoa WHERE iddanhmuc=$idd limit $start,$limit";
    $ketqua = mysqli_query($conn , $sql);
    while ($row = mysqli_fetch_assoc($ketqua)) {
          $number = $row['dongia'];
          $dongia = number_format($number,3,'.','.');
                                    echo'
                                    <tr>

                                        <th scope="row">
                                        </th>
                                        <td>'.$row['tenhang'].'</td>
                                        <td>'.$row['soluong'].'</td>
                                        <td>'.$row['dongia'].'</td>
                                        <td>00000'.$row['id'].'</td>
                                        <td><a href="suasanpham.php?id='.$row['id'].'" <i class="fas fa-edit"></i></a></td>    
                                        <td><a href="xoahanghoa.php?id='.$row['id'].'" <i class="fas fa-trash-alt"></i></a></td>
                                        
                                    </tr> ';    
                                     }
                                   ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row justify-content-end">
                            <div class="tm-table-actions-col">
                            </div>
                            </form>


                            </div>
                                                    <div class="tm-table-mt tm-table-actions-row justify-content-center" >

                            <div class="tm-table-actions-col">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                                    <ul class="pagination tm-pagination">

                                   <?php 

            if ($current_page > 1 && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="product.php?id='.$idd.'&page='.($current_page-1).'" ><i class="fa fa-angle-left"></i></a> </li> ';}
            for ($i = 1; $i <= $total_page; $i++){
                if ( $i == $current_page){
                  echo' <li class="page-item active"><a  class="page-link"  href="product.php?id='.$idd.'&page='.$i.'">'.$i.'</a></li>';
                }
                else{
                    echo '<li class="page-item"><a class="page-link" style="text-decoration:none" href="product.php?id='.$idd.'&page='.$i.'">'.$i.'</a></li> ';
                }
            }
             if ($current_page < $total_page && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="product.php?id='.$idd.'&page='.($current_page+1).'" ><i class="fa fa-angle-right"></i></a> </li> ';
            }
           ?>
       </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                         <h2 class="tm-block-title d-inline-block">Danh mục sản phẩm</h2>
                        <table class="table table-hover table-striped mt-3">
                            <tbody>
                          <?php 
            $conn = mysqli_connect("localhost","root","","demo");
            $sql = "SELECT *FROM danhmuc";
            $ketqua = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($ketqua)) {
                             echo' 
                                <tr>    
                                    <td><a href="product.php?id='.$row['id'].'">'.$row['tendanhmuc'].'</a></td>
                                    <td><a href="suadanhmuc.php?id='.$row['id'].'"><i class="fas fa-edit"></a></td>
                                    <td class="tm-trash-icon-cell">
                                    <a href="xoadanhmuc.php?id='.$row['id'].'"><i class="fas fa-trash-alt tm-trash-icon"></i></a>
                                    </td>
                                </tr>
                                ';
                           
                          }
                                     ?>
                                      </tbody>
                        </table>
                        <form method="POST">
                        <input name="txttendanhmuc" type="text" class="form-control validate " required="" placeholder="Nhập tên danh mục muốn thêm">
                        <button class="btn btn-primary">Thêm danh mục</button>
                        </form>
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


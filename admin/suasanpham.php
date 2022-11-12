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
if (isset($_POST['update'])) {
     $conn = mysqli_connect("localhost","root","","demo");
    $tenhang = $_POST['tenhang'];
    $soluong = $_POST['soluong'];
    $dongia = $_POST['dongia'];
    $sale = $_POST['sale'];
    $hinhanh = './images/products/'.$_POST['hinhanh'].'';
    $sql1 = " UPDATE hanghoa SET tenhang='$tenhang',  soluong=$soluong, dongia='$dongia',sale='$sale',img ='$hinhanh' where id =".$_GET['id'];
    $ketqua = mysqli_query($conn, $sql1);
            echo '<script language="javascript">'; 
            echo 'alert("Update thành công!")'; 
            echo '</script>';
    // $tendanhmuc = $_POST['tendanhmuc'];
       
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product - Dashboard Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="bg02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php include("menu.php") ?>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Sửa sản phẩm</h2>
                        </div>
                    </div> 
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form method="POST" class="tm-edit-product-form">
                                <?php
                                $conn = mysqli_connect("localhost","root","","demo");
                                $sql = "SELECT * FROM hanghoa where id =".$_GET['id'];
                                $ketqua = mysqli_query($conn , $sql);
                                while ($row = mysqli_fetch_assoc($ketqua)) {
                                $number = $row['dongia'];
                                $dongia = number_format($number,3,'.','.');
                                echo'
                                
                               <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4">Tên sản phẩm</label>
                                    <input id="name" name="tenhang" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="'.$row['tenhang'].'"  required="">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4">Kho</label>
                                    <input id="name" name="soluong" type="number" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="'.$row['soluong'].'"  required="">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <label for="stock" class="col-xl-4 ">Đơn giá
                                    </label>
                                    <input id="stock" name="dongia" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7" value="'.$dongia.'"  required="">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="stock" class="col-xl-4 ">Sale
                                    </label>
                                    <input id="stock" name="sale" type="number" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7" value="'.$row['sale'].'"  required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button name="update" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                       <img style="width:250px;height:250px" src="'.$row['img'].'">
                            <div class="custom-file mt-3 mb-3">
                                <input class=" d-block" name="hinhanh" id="fileInput" type="file" style="display:none;"  />        
                                        </div>
                                    </div>
                                       </form>
                                ';
                                    }
                                 ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018. Created by
                    <a href="http://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a> |  Distributed by <a href="https://themewagon.com" class="text-white tm-footer-link">ThemeWagon</a>
                </p>
            </div>
        </footer>
    </div>

   
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    

</body>

</html>


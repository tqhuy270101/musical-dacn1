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
    $conn = mysqli_connect("localhost", "root", "", "demo");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $iddanhmuc = $_POST['iddanhmuc'];
        $tenhang = $_POST['tenhang'];
        $soluong = $_POST['soluong'];
        $dongia = $_POST['dongia'];
        $hinhanh = 'images/products/'.$_POST['hinhanh'].'';
        $sale = $_POST['sale'];
        $date = $_POST['date'];


            $sql = "INSERT INTO hanghoa(iddanhmuc,tenhang,soluong, dongia,img,sale,date) VALUES('$iddanhmuc', '$tenhang','$soluong', '$dongia','$hinhanh','$sale','$date')";
            $ketqua = mysqli_query($conn, $sql);

            echo '<script language="javascript">'; 
            echo 'alert("Thêm sản phẩm thành công!")'; 
            echo '</script>';

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - Dashboard Admin Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
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
                            <h2 class="tm-block-title d-inline-block">Thêm Sản Phẩm</h2>
                        </div>
                    </div>
                    <form method="POST">
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="" class="tm-edit-product-form">
                                <div class="input-group mb-3">
                                    <label for="category" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Danh mục</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="iddanhmuc" name="iddanhmuc">
                                        <?php
                                    $sql = "SELECT *FROM danhmuc";
                                    $ketqua = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($ketqua))
                                    {
                                        echo '<option value="'.$row['id'].'">'.$row['tendanhmuc'].'</option>';
                                    }
                                ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4">Tên sản phẩm</label>
                                    <input id="name" name="tenhang" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"  required="">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4">Số lượng</label>
                                    <input id="name" name="soluong" type="number" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"  required="">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <label for="stock" class="col-xl-4 ">Đơn giá
                                    </label>
                                    <input id="stock" name="dongia" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7" required="">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="stock" class="col-xl-4 ">Sale
                                    </label>
                                    <input id="stock" name="sale" type="number" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7" required="">
                                </div>


                                <div class="input-group mb-3">
                                    <label for="expire_date" class="col-xl-4">Ngày xuất
                                    </label> 
                                    <input id="expire_date" value="ngày/tháng/năm" name="date" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                        data-large-mode="true">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" class="btn btn-primary">Add
                                        </button>
                                         
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                 <input class=" d-block" name="hinhanh" id="fileInput" type="file" style="display:none;"  /> 
                              
                            </div>
                        </div>
                    </div>
                    </form>
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
    
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
</body>

</html>
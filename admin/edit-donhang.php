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
if (isset($_POST['oders'])) {
     $conn = mysqli_connect("localhost","root","","demo");
    $trangthai = $_POST['trangthai'];
    $ghichu = $_POST['ghichu'];
    $sql1 = " UPDATE thanhtoan SET trangthai='$trangthai',ghichu='$ghichu' where id =".$_GET['id'];
    $ketqua = mysqli_query($conn, $sql1);
            echo '<script language="javascript">'; 
            echo 'alert("Update thành công!")'; 
            echo '</script>';
       
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
            <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div  class="col-12">
                            <h2 class="tm-block-title d-inline-block">Cập nhật Oders</h2>
                        </div>
                    </div> 
                    <div  class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-4">
                            <form method="POST" class="tm-edit-product-form">
                                <?php
                                $conn = mysqli_connect("localhost","root","","demo");
                                $sql = "SELECT * FROM thanhtoan where id =".$_GET['id'];
                                $ketqua = mysqli_query($conn , $sql);
                                while ($row = mysqli_fetch_assoc($ketqua)) {
                                echo'
                                
                               <div class="input-group mb-3">
                                    <label class="col-xl-5">ID Oders</label>
                                    <label class="col-xl-5">'.$row['id'].'</label>
                                   <div class="input-group mb-3">
                                    <label class="col-xl-5">Email</label>
                                    <label class="col-xl-5">'.$row['email'].'</label>
  

                                </div>
                                <div class="input-group mb-3">
                                <label class="col-xl-5">Trạng thái</label>  
                                <select style="width:100px" class="custom-select col-xl-12 " name="trangthai">
                                <option value="waiting">Waiting...</option>
                                <option value="inprocess">Inprocess...</option>
                                <option value="delivered">Delivered...</option>
                                </select>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="col-xl-5">Ghi Chú:</label>
                                   
<textarea style="width:300px"class="form-control col-xl-12"  name="ghichu" id="noidungbinhluan" rows="7" ></textarea>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button name="oders" class="btn btn-danger">Update</button>
                                    </div>
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


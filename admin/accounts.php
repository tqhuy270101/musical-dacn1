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
if (isset($_POST['upacounts'])) {
     $conn = mysqli_connect("localhost","root","","demo");
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $quyen = $_POST['quyen'];
    $sql1 = " UPDATE users SET fullname='$fullname', phone='$phone',address='$address',city ='$city',quyen='$quyen' where id =".$_GET['id'];
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
    <title>Accounts Page - Dashboard Template</title>
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="bg03">
    <?php include("menu.php") ?>
    <div class="container">
        <div class="row tm-content-row tm-mt-big">
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Accounts</h2>
                        </div>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <?php  
        $conn = mysqli_connect('localhost', 'root', '', 'demo');
        $idd = $_GET['id'];
        $result = mysqli_query($conn, 'SELECT count(id) as total FROM users where id = '.$idd.'');
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

    $sql = "SELECT * FROM hanghoa users where id=$idd limit $start,$limit";
    $ketqua = mysqli_query($conn , $sql);



                         $conn = mysqli_connect("localhost","root","","demo");
                        $sql = "SELECT *FROM users";
                        $ketqua = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($ketqua)) {
                   echo'
                        <li class="tm-list-group-item"><a href="accounts.php?id='.$row['id'].'">'.$row['email'].'</a>
                         <a  href="xoaacounts.php?id='.$row['id'].'" <i class="fas fa-trash-alt"></i></a>
                         </li>
                       ';
                        }
                    ?>
                    </ol>
                     <div class="tm-table-actions-col">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                                    <ul class="pagination tm-pagination">

                                   <?php 

            if ($current_page > 1 && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="accounts.php?id='.$idd.'&page='.($current_page-1).'" ><i class="fa fa-angle-left"></i></a> </li> ';}
            for ($i = 1; $i <= $total_page; $i++){
                if ( $i == $current_page){
                  echo' <li class="page-item active"><a  class="page-link"  href="accounts.php?id='.$idd.'&page='.$i.'">'.$i.'</a></li>';
                }
                else{
                    echo '<li class="page-item"><a class="page-link" style="text-decoration:none" href="accounts.php?id='.$idd.'&page='.$i.'">'.$i.'</a></li> ';
                }
            }
             if ($current_page < $total_page && $total_page > 1){
                echo '<li class="page-item"><a class="page-link" href="accounts.php?id='.$idd.'&page='.($current_page+1).'" ><i class="fa fa-angle-right"></i></a> </li> ';
            }
           ?>
       </ul>
                                </nav>
                            </div>
                </div>
            </div>

            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Edit Account</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form method="POST">
                                <?php  
                         $conn = mysqli_connect("localhost","root","","demo");
                        $sql = "SELECT *FROM users where id=".$_GET['id'];
                        $ketqua = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($ketqua)) {
                            echo'
                                <div class="form-group">
                                    <label for="name">Họ và tên</label>
                                    <input value="'.$row['fullname'].'" name="fullname" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input readonly value="'.$row['email'].'" type="email" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="password">Password</label>

                                  <div class="row">
                                  <div class="col-10">
                                    <input readonly value="'.$row['password'].'" type="password" class="form-control" >
                                  </div>
                                  <div class="col-2" style="margin-top:9px">
                                    <a  href="doimatkhau.php"><i style="font-size:30px" class="fas fa-edit"></i></a>
                                  </div>
                                </div>
                                </div>
                                 <div class="form-group">
                                 <div class="row">
                                 <div class="col-5">
                                 <label for="phone">Phân Quyền:</label>
                                 </div>
                                 <div class="col-3">
                                 <input type="radio" name="quyen" value="user" checked required > User
                                 </div>
                                 <div class="col-4">
                                 <input type="radio" name="quyen" value="admin" required> Admin
                                 </div>
                                 </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input value="'.$row['phone'].'" name="phone" type="tel" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label for="phone">Address</label>
                                    <input value="'.$row['address'].'" name="address" type="tel" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label for="phone">City</label>
                                    <input value="'.$row['city'].'" name="city" type="tel" class="form-control validate" required>
                                </div>
                                 <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <button name="upacounts" class="btn btn-danger">Update</button>
                                    </div>
                                   
                                </div>
                                </form>';
                            }
                                ?>

                               

                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-col tm-col-small">
                
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

</body>

</html>



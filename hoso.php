<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	
</head>
<body>

<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","demo");
    $idd = $_SESSION['iduser'];
    if(isset($_POST['btn_update'])){
        $img = $_POST['file'];
        $sql = "UPDATE users SET img = '$img' WHERE id= $idd";
        $stmt = $conn->query($sql);
      
        // execute the query
    }
    
  
?>
<div class="container emp-profile">
            <form  method="post">
                <div class="row">
                    <div class="col-md-4 a">
                        <div class="profile-img">
                            <?php
                              $conn = mysqli_connect("localhost","root","","demo");
                              $idd = $_SESSION['iduser'];
                               $sql = "SELECT* FROM users where id = $idd";
                               $ketqua = mysqli_query($conn,$sql);
                               $row = mysqli_fetch_assoc($ketqua) ;
                            echo'<img style="witdh:160px; height:250px" src="./images/'.$row['img'].'" alt=""/>';
                            ?>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file">
                               
                            </div>
                            
                        </div>
                    <button class="btn btn-primary" 
                     style="margin-left:130px;WIDTH:100px" name="btn_update">Cập nhật </button>

                    </div>
                  
                    <?php $conn = mysqli_connect("localhost","root","","demo");
                  
                      $idd = $_SESSION['iduser'];
                    $sql = "SELECT* FROM users where id = $idd";
                    $ketqua = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($ketqua) ;
                   echo'
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        '.$row['fullname'].'
                                    </h5>
                                    <h6>
                                        THÔNG TIN CỦA BẠN
                                    </h6>
                                    <p class="proile-rating">ĐIỂM TÍCH LŨY  : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                                            <a  class="btn btn-primary" name="btnAddMore" href="trangchu.php">Quay lai</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>00000'.$row['id'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['fullname'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['email'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['phone'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Địa chỉ</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['address'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Thành phố</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$row['city'].'</p>
                                            </div>
                                            
                                        </div>
                            </div>';
                              
                     ?>
                        
                        </div>
                    </div>
                </div>
            </form>           
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>  
    <link rel="stylesheet" type="text/css" href="css\stylehoso.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>
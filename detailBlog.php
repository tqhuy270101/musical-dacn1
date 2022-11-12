<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:description" content="">
    <meta property="og:title" content="About-Us">
    <meta name="twitter:description" content="">
    <meta name="twitter:title" content="About-Us">
    <title>Blogsssa</title>

    <link rel="shortcut icon" href="//f.hubspotusercontent40.net/hubfs/19948095/raw_assets/public/pova/images/favicon.svg">
    <link rel="stylesheet" href="css/frontend/css/style.css">
    <link rel="stylesheet" href="css/frontend/css/about-us.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/frontend/fontawesome/css/all.min.css">
</head>
<body>
    <div class="container-fluid">

    <div class="row navbar-container-top">
    <div class="col navbar-link">
        <a class="about-contact-navbar" href="/a/trangchu.php" ><span>Trang chủ</span></a>
        <a class="about-contact-navbar" href="/a/blog.php"><span>Bài viết</span></a>
    </div>
    <div class="col d-flex justify-content-end big-navbar-icon">
        <a class="icon-navbar" target="_blank" href="http://facebook.com"><i class="fab fa-facebook fa-lg"></i></a>
        <a class="icon-navbar" target="_blank" href="http://instagram.com/"><i class="fab fa-instagram-square fa-lg"></i></a>
        <a class="icon-navbar" target="_blank" href="http://youtube.com/"><i class="fab fa-youtube fa-lg"></i></a>
    </div>
</div>
        <div class="row title-pages-details">
            <div class="jumbotron d-flex align-items-end">
                <div class="container">
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'demo');
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM news WHERE id = $id";
                        $ketqua = mysqli_query($conn , $sql);
                        while ($row = mysqli_fetch_assoc($ketqua)) {
                            echo'
                            <h4 class="display-4">'.$row['title'].'</h4>
                        <p><a href="#">'.$row['poster'].'</a> <span class="datetime">'.$row['created_at'].'</span> <span>'.$row['read'].' READER</span></p>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- ---------content-------------- -->
        <div class="container content-blog">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'demo');
                $id = $_GET['id'];
                $sql = "SELECT * FROM news WHERE id = $id";
                $ketqua = mysqli_query($conn , $sql);
                while ($row = mysqli_fetch_assoc($ketqua)) {
                    echo'
                    <div class="row justify-content-center">
                    <div class="col-md-10">
                    '.$row['content'].'
                    </div>
                </div>';
                }
            ?>
               
        </div>

        <!-- introduce -->
        <div class="row intro-yourself">
            <div class="col d-flex justify-content-center">
                <div class="row ground">
                    <div class="col-md-12 d-flex justify-content-center">
                        <img class="rounded-circle" src="./images/Huy1234.png" alt="avatar">
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        <h5>Quang Huy</h5>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        <p>Over. Called from appear also image man thing There whales. Firmament saying whose fifth. She'd from.</p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fas fa-at"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row details-comments">
            <div class="col-md-12 d-flex justify-content-center">

        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'demo');
            $id = $_GET['id'];
            $sql = "SELECT * FROM comments WHERE idBlog = $id";
            $ketqua = mysqli_query($conn , $sql);
            $count = 0;
            while ($row = mysqli_fetch_assoc($ketqua)) {
                $count++;
            }
            echo '<button class="btn-comment"  type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Show Comments ('.$count.')
                </button>'
        ?>
       
                
            </div>
            <div class="col-md list-comment">
                <div class="collapse" id="collapseExample">
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'demo');
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM comments WHERE idBlog = $id";
                    $ketqua = mysqli_query($conn , $sql);
                    $count = 0;

                    
                    while ($row = mysqli_fetch_assoc($ketqua)) {                    
                        echo '
                        <div class="media container">
                            <img class="mr-3 rounded-circle image-comment" src="./images/avthoso.jpg">
                            <div class="media-body">
                                <h5 class="mt-0">'.$row['fName'].' '.$row['lName'].'</h5>
                                '.$row['comment'].'
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- comment -->
      
        <div class="row justify-content-center form-message details-blog">
            
            <form method="POST" class="col" >
                <div class="form-group">
                    <h3 class="comments">Comment</h3>
                    <br>
                </div>
                <div class="form-group">
                    <label>First Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control" required name="fName">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" required name="lName">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Comment <span style="color:red">*</span></label>
                    <textarea class="form-control" rows="3" colums="50" required name="comment"></textarea>
                </div>
                <div class="form-group">
                    <button name="btn_submit_comment" type="submit" class="btn-get-started">Send Message</button>
                </div>
            </form>
        </div>

        <!--  -->
        <div class="row blog-list">
            <div class="col-md-12">
                <h2>Bài viết mới</h2>
            </div>

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'demo');
            $id = $_GET['id'];
            $sql = "SELECT * FROM news WHERE id != $id limit 3";
            $ketqua = mysqli_query($conn , $sql);
            $count = 0;
            while ($row = mysqli_fetch_assoc($ketqua)) {
            
            echo '
        
                <div class="col-md col-card">
                    <div class="card">
                        <a href="#">
                            <img class="card-img-top" src="'.$row['image'].'" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <a href="#" class="field">'.$row['field'].'</a>
                            <a href="#" class="card-title-link">
                                <h5  class="card-title">'.substr($row['title'], 0, 35).'...</h5>
                            </a>
                            <p class="card-text">'.substr($row['content'], 0, 120).'...</p>
                            <hr>
                            <div class="d-flex">
                                <div class="mr-auto p-2">
                                    <div class="media col-md">
                                        <img class="align-self-center mr-3 rounded-circle image" src="/frontend/images/huy.png">
                                        <div class="media-body">
                                            <a href="#" class="mb-0 name-tg">'.$row['poster'].'</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 datetime">'.$row['created_at'].'</div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
        

    </div>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'demo');
        $idblog = $_GET['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // if (isset($_POST['btn_submit_comment'])) {
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $comment = $_POST['comment'];
            $email = $_POST['email'];
            $now = date("Y-m-d H:i:s");
            $sql = "INSERT INTO comments(fName, lName, email, comment, idBlog, created_at)
            VALUES ('$fName', '$lName', '$email', '$comment', '$idblog', '$now')";
            mysqli_query($conn, $sql);
        }
        
    ?>
   


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
    
</body>
</html>
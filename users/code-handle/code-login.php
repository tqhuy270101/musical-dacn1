<?php
    session_start();
    include('C:/xampp/htdocs/musical-dacn1/includes/dbconfig.php');

    if(isset($_POST['btn_login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        try{
            $user = $auth->getUserByEmail("$email");
            try{
                $signInResult = $auth->signInWithEmailAndPassword($email, $password);
                if($signInResult != ''){
                    $_SESSION['id_user'] = $user->uid;
                    $_SESSION['email_user'] = $user->email;
                    header('Location: ../home.php');
                    exit();
                } else {
                    header('Location: ../login.php');
                }
            }
            catch(Exception $e){
                    $_SESSION['status'] = "Wrong Password";
                    echo $e;
                    header('Location: ../login.php');
                    exit();
            }
        }catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e){
            $_SESSION['status'] = "Invalid Email Password";
            header('Location: ../login.php');
            exit();
        }
    }
    else{
        $_SESSION['status'] = "Not Allowed";
        header('Location: ../login.php');
        exit();
    }
?>
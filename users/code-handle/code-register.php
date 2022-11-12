<?php
    session_start();
    include('C:/xampp/htdocs/musical-dacn1/includes/dbconfig.php');
    if (isset($_POST['btn_register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        if ($password == $repassword) {
            $userProperties = [
                'email' => $email,
                'emailVerified' => false,
                'phoneNumber' => '+84'.$phone,
                'password' => $password,
                'displayName' => $name,
            ];
    
            $createUser = $auth->createUser($userProperties);
            
            
        
            if(isset($createUser)){

                $user = $auth->getUserByEmail("$email");
                try{
                    $signInResult = $auth->signInWithEmailAndPassword($email, $password);
                    if($signInResult != ''){
                        $_SESSION['id_user'] = $user->uid;
                        $_SESSION['email_user'] = $user->email;
                    
                        header('Location: home.php');
                        exit();
                    }
                } catch (Exception $e){

                }
            } else {
                header('Location: ../register.php');
                exit();
            }
        } else {
            $_SESSION['error'] = " *Mật khẩu không trùng nhau";
            header('Location: ../register.php');
            exit();
        }
    }
?>
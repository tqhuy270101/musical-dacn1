<?php
session_start();
unset($_SESSION['id_user']);
unset($_SESSION['email_user']);

header('Location: login.php');
exit();
?>
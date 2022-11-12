<?php
    require __DIR__.'/vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\Auth;

    $factory = (new Factory)
    ->withServiceAccount('C:/xampp/htdocs/firebase/includes/cuong.json')
    ->withDatabaseUri('https://classfirebase-f5dfa-default-rtdb.firebaseio.com');

    $database = $factory->createDatabase();
    $auth = $factory-> createAuth();
?>
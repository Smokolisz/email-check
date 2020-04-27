<?php

if(isset($_POST["email"])) {
    $conn = new PDO('mysql:dbname=test;host=localhost;charset=utf8', 'root', '');

    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (mysqli_connect_errno()) {
        echo "Server error.";
        exit();
    }



    $stmt = $conn->prepare('SELECT * FROM fx_email WHERE email=:email');
    $stmt->execute(array('email' => $_POST["email"]));
    $rows = $stmt->fetchAll();
    $count = count($rows);

    if($count > 0) {
        echo "False";
    } else {
        echo "True";
    }

}
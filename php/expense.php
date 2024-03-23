<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'prototype';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_errno) {
        printf("Connect failed: %s<br />", $conn->connect_error);
        exit();
    }

    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $subcategory = mysqli_real_escape_string($conn,$_POST['subcategory']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $payment = mysqli_real_escape_string($conn,$_POST['payment']);
    $amount = mysqli_real_escape_string($conn,$_POST['amount']);

    session_start();
    $username = $_SESSION['username'];

    $sql = "INSERT INTO transactions(username, date, category, subcategory, payment, amount) VALUES('$username', '$date', '$category', '$subcategory', '$payment', '$amount')";
    $result=mysqli_query($conn, $sql);
    $sql1 = "UPDATE accounts SET expense=expense+$amount where username='$username'";
    $result=mysqli_query($conn, $sql1);

    if ($result) {
        echo "<script>alert('TRANSACTION added'); window.location.href='../dashboard.php';</script>";
    }
    else{
       echo "window.location.href='../dashboard.php';</script>";
    }
    
    
    
?>

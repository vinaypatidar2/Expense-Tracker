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

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);

    
    $sql = "SELECT * FROM login WHERE username='$username' AND pwd='$password'";
    $result=mysqli_query($conn, $sql);


    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['username'] = $username;
        echo "<script>alert('LOGGED IN  successfully'); window.location.href='../dashboard.php';</script>";
        
        //  header("Location: ../dashboard.php");
        //  exit();
     }
     else {
    echo "<script>alert('INVALID credentials'); window.location.href='../loginfinal.html';</script>";

        // header("Location: ../loginfinal.html");
    //     exit();
     }
    


    mysqli_close($conn);

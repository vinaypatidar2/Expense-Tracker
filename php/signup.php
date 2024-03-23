<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'prototype';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($conn->connect_errno ) {
    printf("Connect failed: %s<br />", $conn->connect_error);
    exit();
    }
    //printf('Connected successfully.<br />');
    
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Step 3: Sanitize the data

    // Step 4: Construct the SQL query
    $sql1="INSERT INTO signup(firstname, lastname, username, email, dob) VALUES('$firstname','$lastname','$username','$email','$dob')";
    $sql2="INSERT INTO login(username, pwd) VALUES('$username','$pwd')";
    $sql3="INSERT INTO accounts(username,balance,expense) VALUES('$username',0,0)";
    
    

    $result1=mysqli_query($conn, $sql1);
    $result2=mysqli_query($conn, $sql2);
    $result3=mysqli_query($conn, $sql3);

    // Step 5: Execute the query
    if ($result1 && $result2 && $result3) {
    
    echo "<script>alert('SIGN UP SUCCESSFUL YOU CAN LOGIN NOW'); window.location.href='../index.html';</script>";

    } else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }

    // Step 6: Close the database connection
    //mysqli_close($conn);
    
?>
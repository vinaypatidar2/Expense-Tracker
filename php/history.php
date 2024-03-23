<?php 

$conn=new mysqli("localhost","root","root","prototype");
session_start();
$username = $_SESSION['username'];
$sql="SELECT date,subcategory,payment,amount FROM transactions where username='$username' order by date desc";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
 

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORY</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Unbounded&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="newcss.css"> -->
<link rel="stylesheet" href="css/navigation.css">
<link rel="stylesheet" href="css/table.css">


<body>
    <nav>
      <ul>
        <li><a href="dashboard.php">Dashboard</a>
        </li>
        <li><a href="transaction.html">Expenses</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="php/category.php">Categories/History</a></li>
        <!-- <li><a href="history.php">History</a></li> -->
        <li><a href="loginfinal.html">Logout</a></li>
      </ul>
    </nav>

    <br><br>
    <div style="color:black">
        <p><center><h1>TRANSACTION HISTORY</h1></center></p>
    </div>
    <div class="container">
        <table>
            <tr>
                <td> DATE </td>
                <td> details </td>
                <td> MODE </td>
                <td> AMOUNT </td>
                
            </tr>
            <tr>
            <?php
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['subcategory']; ?></td>
                <td><?php echo $row['payment']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                
            </tr>
            <?php
                }
            ?>

        </table>
            
    </div>
</body>
</html>
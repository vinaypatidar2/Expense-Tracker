<?php

$conn = new mysqli("localhost", "root", "root", "prototype");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $amount = $_POST["amount"];
  session_start();
  $username = $_SESSION['username'];
  $sql = "UPDATE accounts SET balance=balance+$amount where username='$username'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>alert(' $amount  added successfully'); window.location.href='../dashboard.php';</script>";
  } else {
    echo "window.location.href='../dashboard.php';</script>";
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADD BALANCE</title>
  <link rel="stylesheet" href="../css/navigation.css">
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>

  <nav>
    <ul>
      <li><a href="../dashboard.php">Dashboard</a></li>
      <li><a href="../transaction.html">Expenses</a></li>
      <li><a href="../stats.php">Reports</a></li>
      <li><a href="category.php">Categories</a></li>
      <!-- <li><a href="../history.php">History</a></li> -->
      <li><a href="../loginfinal.html">Logout</a></li>
    </ul>
  </nav>

  <br><br>
  <div class="btn1">
    <a href="../transaction.html"><button>Add Transaction</button></a>
  </div>

  <div class="container">
    <h1>ADD BALANCE</h1>
    <form method="post">
      <div class="form_group">
        <h4>AMOUNT:</h4>
        <input type="number" name="amount" id="amount" placeholder="100.00" required>
      </div>
      <br>

      <div class="form_group">
        <button type="submit" class="btn1">Submit</button>
      </div>
    </form>
  </div>

</body>

</html>
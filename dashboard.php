<?php
$conn = new mysqli("localhost", "root", "root", "prototype");

session_start();
$username = $_SESSION['username'];
$sql = "SELECT * from accounts Where username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sql1="SELECT date,subcategory,payment,amount FROM transactions where username='$username' order by date desc LIMIT 3";
$result1 = mysqli_query($conn, $sql1);



?>


<!DOCTYPE html>

<html>

<head>
  <title>Expense Tracker Dashboard</title>
</head>

<link href="https://fonts.googleapis.com/css2?family=Unbounded&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/navigation.css">

<body>

  <nav>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="transaction.html">Expenses</a></li>
      <li><a href="stats.php">Reports</a></li>
      <li><a href="php/category.php">Categories</a></li>
      <!-- <li><a href="history.php">History</a></li> -->
      <li><a href="loginfinal.html">Logout</a></li>
    </ul>
  </nav>


  <main>
    <section class="totals">
      <h2>SAVINGS LEFT </h2>
      <p><?php echo "$", $row['saving']; ?></p>
    </section>

    <section class="totals">
      <h2>TOTAL EXPENSE </h2>
      <p><?php echo "$", $row['expense']; ?></p>
    </section>

    <section class="totals">
      <h2>TOTAL BALANCE CREDITED </h2>
      <p><?php echo "$", $row['balance']; ?></p>
    </section>

    <section class="budget">
      <h2>Budget Progress</h2>
      <p>
        <?php echo "$", $row['expense'], " spent of $", $row['balance'], " budget"; ?>
      </p>
      <progress value="<?php echo $row['expense']; ?>" max="<?php echo $row['balance']; ?>"></progress>
    </section>


    <section class="recent-transactions">
      <h2>Recent Transactions</h2>
      <table>
      
      <thead>
            <tr>
                <td> DATE </td>
                <td> details </td>
                <td> MODE </td>
                <td> AMOUNT </td>
                
            </tr>
      </thead>
      <tbody>
            <tr>
            <?php
                while($row1 = mysqli_fetch_assoc($result1))
                {
            ?>
                <td><?php echo $row1['date']; ?></td>
                <td><?php echo $row1['subcategory']; ?></td>
                <td><?php echo $row1['payment']; ?></td>
                <td><?php echo $row1['amount']; ?></td>
                
            </tr>
            <?php
                }
            ?>
            </tbody>

        
      </table>
    </section>

    
  </main>
  <footer>
    <p>Copyright © 2023 Expense Tracker</p>
  </footer>
</body>

</html>
<?php

$conn = new mysqli("localhost", "root", "root", "prototype");
session_start();
$username = $_SESSION['username'];
$sql = "SELECT category,DATE_FORMAT(date, '%d-%M-%Y') as date, payment, amount 
FROM transactions where username='$username' order by date desc";

$category = 'all';
$payment = 'mode';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fdate = $_POST["fdate"];
    $tdate = $_POST["tdate"];

    $category = $_POST["category"];
    $payment = $_POST["payment"];

    if ($category=='*' && $payment=='*'){
        $sql = "SELECT category, DATE_FORMAT(date, '%d-%M-%Y') as date, payment, amount FROM transactions 
        where username='$username'  and date between '$fdate' and '$tdate' order by date desc";
        
    } elseif($category=='*'){
        $sql = "SELECT category, DATE_FORMAT(date, '%d-%M-%Y') as date, payment, amount FROM transactions 
        where username='$username' and payment='$payment' and date between '$fdate' and '$tdate' order by date desc";
    
    } elseif($payment=='*'){
        $sql = "SELECT category, DATE_FORMAT(date, '%d-%M-%Y') as date, payment, amount FROM transactions 
        where username='$username' and category='$category' and date between '$fdate' and '$tdate' order by date desc";

    } else{
        $sql = "SELECT category, DATE_FORMAT(date, '%d-%M-%Y') as date, payment, amount FROM transactions 
        where username='$username' and category='$category'and payment='$payment' and date between '$fdate' and '$tdate' order by date desc";

    }

  }
  $result=mysqli_query($conn, $sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORY</title>


</head>
<link rel="stylesheet" href="../css/navigation.css">
<link rel="stylesheet" href="../css/dashboard.css">
<!-- <link rel="stylesheet" href="../css/style.css"> -->

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


    <div class="container">
        <h2><u>ADD FILTER </u></h2>

        <form  method="post">
        

            <div class="form_group e">
                <label for="date" >From Date: </label>
                <input type="date" value="2023-01-01" name="fdate" id="fdate" placeholder="Date" required>
            </div>
            <div class="form_group e">
                <label for="date">To Date: </label>
                <input type="date" value="<?php echo date('Y-m-d')?>" name="tdate" id="tdate" placeholder="Date" required>
            </div>

            <div class="form_group e">
                <!-- <label for="category">Choose a Category:</label> -->
                <label>Category: </label>
                <select name="category" id="category" class="dropdown" required>
                    <option value="*" >All</option>
                    <option value="Food">Food</option>
                    <option value="Educational">Educational</option>
                    <option value="Services">Services</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Personal">Personal</option>
                    <option value="Housing">Housing</option>
                    <option value="Others">Others</option>
                 
                </select>
            </div>

            <div class="form_group e">
                <label>Payment Mode: </label>
                <select name="payment" id="payment" class="dropdown" required>
                    <option value="*" >All</option>
                    <option value="Online">Online</option>
                    <option value="Cash">Cash</option>

                </select>
            </div>

            <br>

            <div class="form_group">
                <button type="submit" class="btn">Submit</button>
            </div>




        </form>
    </div>
    <h2><b> Category</b> : <?php echo $category; ?>  |<b> Payment Mode</b> : <?php echo $payment; ?></h2>
    <section class="recent-transactions" style="font-size: 25px;">
      <!-- <h2>CATEGORY WISE</h2> -->
      <table>
      
      <thead>
            <tr>
                <td> CATEGORY </td>
                <td> DATE </td>
                <td> PAYMENT </td>
                <td>  AMOUNT </td>
                
                
            </tr>
      </thead>
      <tbody>
            <tr>
            <?php
                while($row1 = mysqli_fetch_assoc($result))
                {
            ?>
                <td><?php echo $row1['category']; ?></td>
                <td><?php echo $row1['date']; ?></td>
                <td><?php echo $row1['payment']; ?></td>
                <td><?php echo $row1['amount']; ?></td>
        
                
            </tr>
            <?php
                }
            ?>
            </tbody>

        
      </table>
    </section>

   
</body>

</html>



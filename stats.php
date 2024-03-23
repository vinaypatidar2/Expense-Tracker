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
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Statistics</title>
  <!-- plugins:css -->

  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="style2.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="chart.css">

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <style>
      .borderexample {
      border-width:3px;
      border-style:solid;
      border-color:#FF0000;
      }
      </style>
      <style>
      .borderexample2 {
      border-width:3px;
      border-style:solid;
      border-color:#008000;
      }
      </style>

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Statistics</span>
            </a>
          </li>


          
          

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome </h3>
                  
                </div>

              </div>
            </div>
          </div>
         
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <head><b> Weekly Report </b></head>
                  <p> </p>

                                
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                  <body>
                  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                  <script>
                  const xValues = [1,2,3,4,5,6,7];


                  new Chart("myChart", {
                    type: "line",
                    data: {
                      labels: xValues,
                      datasets: [{ 
                        data: [70,50,100,100,90,150,200],
                        label : "This Week" ,
                        borderColor: "red",
                        fill: false
                      }, { 
                        data: [60,80,120,150,70,100,250],
                        label : "last week",
                        borderColor: "green",
                        fill: false
                      }, ]
                    },
                    options: {
                      legend: {display: false}
                    }
                  });
                  </script>
                  </body>
                  <p><span class="borderexample"> &nbsp&nbsp&nbsp&nbsp</span>This Week </p> 
				          <p><span class="borderexample2"> &nbsp&nbsp&nbsp&nbsp</span>Last Week </p> 
                 
                </div>
                </div>
                <!-- </div> -->
            </div>
            <!-- <div class="row"> -->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                
                <?php
                  
                  $dataPoints = array( 
                    array("label"=>"Food", "y"=>42),
                    array("label"=>"Entertainment", "y"=>25),
                    array("label"=>"Educational", "y"=>16),
                    array("label"=>"Services", "y"=>10),
                    array("label"=>"Other", "y"=>7),
                    
                  )
                    
                  ?>

                  
                  <script>
                  window.onload = function() {
                    
                    
                  var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                      text: "Expenses"
                    },
                    subtitles: [{
                      text: "2023"
                    }],
                    data: [{
                      type: "pie",
                      yValueFormatString: "#,##0.00\"%\"",
                      indexLabel: "{label} ({y})",
                      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                  });
                  chart.render();
                    
                  }
                  </script>
                  
                  <body>
                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                  </body>
                                               
                 
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Monthly Reports</p>

                              <p class="mb-2 mb-xl-0"></p>
                            </div>  
                            </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                           
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <tr>
                                      <td class="text-muted">December</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">7200</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">January</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">4400</h5></td>
                                    </tr>

                                    <tr>
                                      <td class="text-muted">February</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">9200</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">March</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">6600</h5></td>
                                    </tr>
   
                                    <tr>
                                      <td class="text-muted">April</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">3800</h5></td>
                                    </tr>


                          
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
  

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

</body>

</html>


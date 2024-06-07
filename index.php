<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" 
    />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- CSS -->
     <link rel="stylesheet" href="./assets/css/main.css">

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>
</head>
<body >
    
    <?php
        include "./sidebar.php";
        include_once "./config/dbconnect.php";
    ?>

    <div class="main-content allContent-section py-4" id="main-content">
        <div class="dashboard">
            <div class="dashboard-desk">
              <h1>Dashboard</h1>
              <p>Welcome! <span>SportsEquipment Admin</span></p>
            </div>

            <div class="dashboard-container">
                <div class="dashboard-card">
                    <div class="card">
                        <i class="fa fa-users"></i>
                        <h4>Total Users</h4>
                        <h5>
                            <?php
                                $sql="SELECT * from users where isAdmin=0";
                                $result=$conn-> query($sql);
                                $countUsers=0;
                                if ($result-> num_rows > 0){
                                    while ($row=$result-> fetch_assoc()) {
                                        $countUsers++;
                                    }
                                }
                                echo $countUsers;
                            ?>
                        </h5>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card">
                        <i class="fa fa-th-large"></i>
                        <h4>Total Categories</h4>
                        <h5>
                        <?php
                           $sql="SELECT * from category";
                           $result=$conn-> query($sql);
                           $countCategories=0;
                           if ($result-> num_rows > 0){
                               while ($row=$result-> fetch_assoc()) {
                                   $countCategories++;
                               }
                           }
                           echo $countCategories;
                       ?>
                       </h5>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card">
                        <i class="fa fa-th"></i>
                        <h4>Total Products</h4>
                        <h5>
                        <?php
                           $sql="SELECT * from product";
                           $result=$conn-> query($sql);
                           $countProducts=0;
                           if ($result-> num_rows > 0){
                               while ($row=$result-> fetch_assoc()) {
                                   $countProducts++;
                               }
                           }
                           echo $countProducts;
                       ?>
                       </h5>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card">
                        <i class="fa fa-list"></i>
                        <h4>Total Orders</h4>
                        <h5>
                        <?php
                           $sql="SELECT * from orders";
                           $result=$conn-> query($sql);
                           $countOrders=0;
                           if ($result-> num_rows > 0){
                               while ($row=$result-> fetch_assoc()) {
                                   $countOrders++;
                               }
                           }
                           echo $countOrders;
                       ?>
                       </h5>
                    </div>
                </div>                
            </div>

            <div class="chart-container">
                <canvas id="dashboardChart"></canvas>
            </div>

          <footer>
            <div class="social-icons">
                <a href="https://github.com/jhonvnbb" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://www.youtube.com/channel/UCML2M8j1wTcXTP8D0mHPhgw" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/jhonnvnbb" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <p>&copy; 2024 <span>Sport Equipments</span>. All Rights Reserved.</p>
          </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('dashboardChart').getContext('2d');
            const dashboardChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Users', 'Total Categories', 'Total Products', 'Total Orders'],
                    datasets: [{
                        label: 'Dashboard Data',
                        data: [
                            <?php echo $countUsers; ?>, 
                            <?php echo $countCategories; ?>, 
                            <?php echo $countProducts; ?>, 
                            <?php echo $countOrders ?>
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#333'
                            },
                            grid: {
                                color: 'rgba(200, 200, 200, 0.2)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#333'
                            },
                            grid: {
                                color: 'rgba(200, 200, 200, 0.2)'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                boxWidth: 0,
                                padding: 20,
                                color: '#333',
                                font: {
                                    size: 16,
                                    lineHeight: 1.5
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
       
            
        <?php
            if (isset($_GET['category']) && $_GET['category'] == "success") {
                echo '<script> alert("Category Successfully Added")</script>';
            }else if (isset($_GET['category']) && $_GET['category'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['size']) && $_GET['size'] == "success") {
                echo '<script> alert("Size Successfully Added")</script>';
            }else if (isset($_GET['size']) && $_GET['size'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['variation']) && $_GET['variation'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
        ?>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>
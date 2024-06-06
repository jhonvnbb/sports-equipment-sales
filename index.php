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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
      crossorigin="anonymous"
    > -->

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/main.css">

  </head>
</head>
<body >
    
        <?php
            // include "./adminHeader.php";
            include "./sidebar.php";
           
            include_once "./config/dbconnect.php";
        ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Users</h4>
                    <h5 style="color:white;">
                    <?php
                        $sql="SELECT * from users where isAdmin=0";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Categories</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from category";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Products</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from product";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total orders</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from orders";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
      <header>
        <div class="dropdown" style="float: right; margin: 10px;">
          <button class="dropbtn"><i class="fas fa-user" style="padding-right: 10px;"></i><?php echo $fetch_info['username'] ?></button>
          <div class="dropdown-content">
            <a href="../kamar/">Kamar</a>
            <a href="#">Pesanan</a>
            <a href="#">User</a>
            <a href="#" onclick="return confirmLogout()" style="color: #c90101"><i class="fas fa-lock" style="margin-right: 5px;"></i>Logout</a>
          </div>
        </div>
      </header>

      <div class="dashboard">
        <div class="dashboard-desk">
          <h1>Dashboard</h1>
          <p>Wellcome! <span>AstonServe Admin</span></p>
        </div>
        <div class="dashboard-card">
            <div class="card">
                <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                <h4 style="color:white;">Total Users</h4>
                <h5 style="color:white;">
                    <?php
                        $sql="SELECT * from users where isAdmin=0";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                </div>
            </div>
        <div class="dashboard-card">
            <div class="icon"><i class="fas fa-users"></i></div>
            <h3>Total User</h3>
            <p><?php echo $total_user_result; ?></p>
        </div>
        <div class="dashboard-card">
            <div class="icon"><i class="fas fa-cart-plus"></i></div>
            <h3>Total Pesanan Diverifikasi</h3>
            <p><?php echo $total_pesananDiverifikasi_result; ?></p>
        </div>
        <div class="dashboard-card">
            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
            <h3>Total Pesanan</h3>
            <p><?php echo $total_pesanan_result; ?></p>
        </div>
        <div class="dashboard-card">
            <div class="icon"><i class="fas fa-user-shield"></i></div>
            <h3>Total Admin</h3>
            <p><?php echo $total_admin_result; ?></p>
        </div>
        <div class="dashboard-card">
        <div class="icon"><i class="fas fa-boxes-packing"></i></div>
          <h3>Total Kamar Tersedia</h3>
          <p><?php echo $total_tersedia_result; ?></p>
        </div>
        <div class="dashboard-card total-stok">
        <div class="icon"><i class="fas fa-boxes-packing"></i></div>
          <h3>Total Kamar Tersedia</h3>
          <p><?php echo $total_tersedia_result; ?></p>
        </div>
      </div>

      <footer>
        <div class="social-icons">
            <a href="https://github.com/jhonvnbb" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://www.youtube.com/channel/UCML2M8j1wTcXTP8D0mHPhgw" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/jhonnvnbb" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2024 <span>Aston Serve</span>. All Rights Reserved.</p>
      </footer>
    </div>
       
            
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
 
</html>
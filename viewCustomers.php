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

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

  </head>
</head>
<body >
    
        <?php
            include "./sidebar.php";
            include_once "./config/dbconnect.php";
        ?>

    <div class="main-content allContent-section" id="main-content">
        <div class="dashboard">
          <div class="dashboard-desk">
            <h1>Dashboard</h1>
            <p>Welcome! <span>SportEquipment Admin</span></p>
          </div>
          <div class="dashboard-container">
            <div >
               <h2>All Customers</h2>
               <table class="table ">
                 <thead>
                   <tr>
                     <th class="text-center">S.N.</th>
                     <th class="text-center">Username </th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Contact Number</th>
                     <th class="text-center">Joining Date</th>
                   </tr>
                 </thead>
                 <?php
                   include_once "./config/dbconnect.php";
                   $sql="SELECT * from users where isAdmin=0";
                   $result=$conn-> query($sql);
                   $count=1;
                   if ($result-> num_rows > 0){
                     while ($row=$result-> fetch_assoc()) {
                        
                 ?>
                 <tr>
                   <td><?=$count?></td>
                   <td><?=$row["first_name"]?> <?=$row["last_name"]?></td>
                   <td><?=$row["email"]?></td>
                   <td><?=$row["contact_no"]?></td>
                   <td><?=$row["registered_at"]?></td>
                 </tr>
                 <?php
                         $count=$count+1;
                        
                     }
                 }
                 ?>
               </table>
              </div>
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


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>
 
</html>

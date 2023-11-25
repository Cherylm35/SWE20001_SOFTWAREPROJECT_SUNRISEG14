<?php
require '../config/connect.php';
$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SUNRISE - ADMINPANEL | HOME (DASHBOARD)</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
        
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../admin/adminstyle.css" />
        <style>
            
        </style>
    </head>
    <body>
        <!-- header -->
        <?php include '../admin/adminheader.php'; ?>
        <!-- dashboard -->
        <section class="dashboard">

            <h1 class="heading"><i class="fa fa-tachometer" aria-hidden="true"></i> dashboard</h1>
         
            <div class="box-container">
         
               <div class="box">
                  <h3>Welcome!</h3>
                  <p><?php echo $row["name"]; ?></p>
                  <a href="../admin/admineditprofile.php" class="btn">Edit Profile</a>
               </div>
         
               <div class="box">
                  <?php
                  $total_pendings = 0;
                  $select_pendings = mysqli_query($conn, "SELECT * FROM `orders` WHERE rental_status = 'pending'");
                  if(mysqli_num_rows($select_pendings) > 0){
                     while($row = mysqli_fetch_assoc($select_pendings)){ 
                        $total_pendings += $row['total_price'];
                     }
                  }
               ?>
               <h3>Total Pendings</h3>
               <p><span>RM</span><?php echo $total_pendings; ?><span></span></p>
               <a href="../admin/adminrentals.php" class="btn">View Rentals</a>
               </div>
         
               <div class="box">
               <?php
                  $total_completes = 0;
                  $select_completes = mysqli_query($conn, "SELECT * FROM `orders` WHERE rental_status = 'completed'");
                  if(mysqli_num_rows($select_completes) > 0){
                     while($row = mysqli_fetch_assoc($select_completes)){ 
                           $total_completes += $row['total_price'];
                        }
                     }
               ?>
               <h3>Total Earned</h3>
               <p><span>RM</span><?php echo $total_completes; ?><span></span></p>
               <a href="../admin/adminrentals.php" class="btn">View Rentals</a>
               </div>

               <div class="box">
               <?php
               $select_orders = mysqli_query($conn, "SELECT * FROM `orders`");
               $number_of_orders = mysqli_num_rows($select_orders);
               ?>
                  <h3>Total Rentals</h3>
                  <p><?php echo $number_of_orders; ?></p>
                  <a href="../admin/adminrentals.php" class="btn">View Rentals</a>
               </div>
         
               <div class="box">
                  <?php
                     $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                     $number_of_products = mysqli_num_rows($select_products);
                     ?>
                  <h3>Total Products</h3>
                  <p><?php echo $number_of_products; ?></p>
                  <a href="../admin/adminproducts.php" class="btn">View Products</a>
               </div>
         
               <div class="box">
               <?php
                  $select_users = mysqli_query($conn, "SELECT * FROM `admins` where userLevel='user'");
                  $number_of_users = mysqli_num_rows($select_users);
                  ?>
                  <h3>Total Users</h3>
                  <p><?php echo $number_of_users; ?></p>
                  <a href="../admin/adminusers.php" class="btn">View Users</a>
               </div>
         
               <div class="box">

                  <?php
                     $select_admins = mysqli_query($conn, "SELECT * FROM `admins` where userLevel='admin'");
                     $number_of_admins = mysqli_num_rows($select_admins);
                     ?>
                  <h3>Total Admins</h3>
                  <p><?php echo $number_of_admins; ?></p>
                  <a href="../admin/adminadmins.php" class="btn">View Admins</a>
               </div>
         
               
         
            </div>
         
         </section>
         <section class="graph">
            
         </section>
         
        
        <script type="text/javascript" src="../admin/admin.js"></script>
        <script>
           
        </script>
    </body>
</html>
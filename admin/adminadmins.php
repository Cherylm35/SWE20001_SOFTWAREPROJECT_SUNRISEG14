<?php

include '../config/connect.php';

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:adminlogin.php');
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $delete_wishlist_item = mysqli_query($conn, "DELETE FROM admins WHERE id = '$id'");
   mysqli_query($conn, "DELETE FROM admins WHERE id = $id");
   header('location:adminadmins.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SUNRISE - ADMINPANEL | ADMINS ACCOUNTS</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../admin/adminstyle.css">

</head>
<body>

<?php include '../admin/adminheader.php'; ?>

<section class="accounts">

   <h1 class="heading"><i class="fa fa-user-secret" aria-hidden="true"></i> Admin Accounts</h1>

   <div class="box-container">

   <div class="box">
      <p>Create New Admin</p>
      <a href="../admin/adminregisters.php" class="option-btn">Create</a>
   </div>
   
   <?php
      $select = mysqli_query($conn, "SELECT * FROM admins where userLevel='admin'");
         while($row = mysqli_fetch_assoc($select)){ 
   ?>
   <div class="box">
      <p> Admin ID : <span><?php echo $row['id']; ?></span> </p>
      <p> Admin Name : <span><?php echo $row['name']; ?></span> </p>
      <p> Admin Username : <span><?php echo $row['username']; ?></span> </p>
      <p> Admin Email : <span><?php echo $row['email']; ?></span> </p>
      <p> Admin Contact No. : <span><?php echo $row['phone']; ?></span> </p>
      <div class="flex-btn"> 
         <?php
            if($row['id'] == $admin_id){
               echo '<a href="../admin/admineditprofile.php" class="option-btn">Edit</a>';
            }
         ?>
         <a href="../admin/adminadmins.php?delete=<?= $row['id']; ?>" onclick="return confirm('Delete this account? User related information will also be delete.')" class="delete-btn">Delete</a>
      </div>
   </div>
   <?php
         }
   ?>

   </div>

</section>












<script src="../admin/admin.js"></script>
   
</body>
</html>
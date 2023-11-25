<?php

include '../config/connect.php';

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:adminlogin.php');
}


if (isset($_POST['update_payment'])) {
   $order_id = $_POST['order_id'];
   $combined_status = $_POST['status'];

   // Split the combined status into payment and rental statuses
   list($payment_status, $rental_status) = explode('-', $combined_status);

   $update_payment = mysqli_query($conn, "UPDATE `orders` SET payment_status = '$payment_status', rental_status = '$rental_status' WHERE id = '$order_id'");
   
   echo "<script> alert('Status updated!'); </script>";
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_order = mysqli_query($conn, "DELETE FROM `orders` WHERE id ='$delete_id'");
   if ($delete_order) {
      echo "<script> alert('Rental deleted successfully!'); </script>";
   } else {
      echo "<script> alert('Failed to delete rental.'); </script>";
   }
   header('location:adminrentals.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SUNRISE - ADMINPANEL | Rentals</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../admin/adminstyle.css">

</head>
<body>

<?php include '../admin/adminheader.php'; ?>

<section class="orders">

<h1 class="heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Rentals</h1>

<div class="box-container">

   <?php
   $select_orders = mysqli_query($conn, "SELECT * FROM `orders`");
   if(mysqli_num_rows($select_orders) > 0){
   while($row = mysqli_fetch_assoc($select_orders)){ 
      date_default_timezone_set("Asia/Kuala_Lumpur");
   ?>
   <div class="box">
      <p> Rental ID : <span><?= $row['id']; ?></span> </p>
      <p> Placed Date : <span><?php echo date('d-m-Y'); ?></span> </p>
      <p> Name : <span><?= $row['name']; ?></span> </p>
      <p> Contact No. : <span><?= $row['number']; ?></span> </p>
      <p> Email : <span><?= $row['email']; ?></span> </p>
      <p> Products : <span><?= $row['total_products']; ?></span></p>
      <p> Total Amount : <span>RM<?= $row['total_price']; ?></span> </p>

      <p> Payment Method : <span><?= $row['method']; ?></span> </p>
      <form action="" method="post">
   <input type="hidden" name="order_id" value="<?= $row['id']; ?>">
   <select name="status" class="select">
      <option selected disabled><?= $row['payment_status'] ; ?></option>
      <option value="onlydeposit-pending">OnlyDeposit - Pending</option>
      <option value="fullfilled-pending">Fullfilled - Pending</option>
      <option value="fullfilled-completed">Fullfilled - Completed</option>
   </select> 
   <div class="flex-btn">
      <input type="submit" value="Update" class="option-btn" name="update_payment">
      <a href="../admin/adminrentals.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this rental? Rental-related information will also be deleted.');">Delete</a>
   </div>
</form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No orders available!</p>';
      }
   ?>

</div>

</section>












<script src="../admin/admin.js"></script>
   
</body>
</html>

<?php

include '../config/connect.php';

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:adminlogin.php');
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $delete_user = mysqli_query($conn, "DELETE FROM admins WHERE id = '$id'");
   $delete_orders = mysqli_query($conn, "DELETE FROM orders WHERE user_id = '$id'");
   $delete_messages = mysqli_query($conn, "DELETE FROM messages WHERE user_id = '$id'");
   $delete_cart = mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$id'");
   $delete_wishlist = mysqli_query($conn, "DELETE FROM wishlist WHERE user_id = '$id'");
   header('location:adminusers.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SUNRISE - ADMINPANEL | Users Accounts</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../admin/adminstyle.css">

   <style>
      /* Style for the modal */
.modal {
   display: none;
   position: fixed;
   z-index: 1;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
   overflow: auto;
   background-color: rgba(0,0,0,0.7);

}

.modal-content {
   position: relative;
   background-color: #fefefe;
   margin: 10% auto;
   padding: 20px;
   border: 1px solid #888;
   width: 80%;
}

.close {
   position: absolute;
      top: 0;
      right: 1;
      padding: 10px; /* Increase the padding to make the close button larger */
      cursor: pointer;
      color: red;
      font-size: 35px; /* Increase the font size for better visibility */
      font-style: bold;
}

/* Style for the iframe */
iframe {
   width: 100%;
   height: 100%;
   border: none;
}
   </style>

</head>
<body>

<?php include '../admin/adminheader.php'; ?>
<section class="accounts">

   <h1 class="heading"><i class="fa fa-users" aria-hidden="true"></i> user accounts</h1>
   <?php
      $select = mysqli_query($conn, "SELECT * FROM admins where userLevel='user'");
         while($row = mysqli_fetch_assoc($select)){ 
   ?>
   <div class="box-container">

   
   <div class="box">
      <p> User ID : <span><?php echo $row['id']; ?></span> </p>
      <p> Username : <span><?php echo $row['username']; ?></span> </p>
      <p> Name : <span><?php echo $row['name']; ?></span> </p>
      <p> Email : <span><?php echo $row['email']; ?></span> </p>
      <p> Contact No. : <span><?php echo $row['phone']; ?></span> </p>
      <!-- Display Rentals -->
      <p> Rentals: 
   <?php
   $user_id = $row['id'];
   $rentals = array();
   $select_rentals = mysqli_query($conn, "SELECT id FROM orders WHERE user_id = '$user_id'");
   while ($rental_row = mysqli_fetch_assoc($select_rentals)) {
       $rental_id = $rental_row['id'];
       $rentals[] = '<a href="javascript:void(0);" onclick="openModal(' . $rental_id . ')">' . $rental_id . '</a>';
   }
   echo implode(', ', $rentals);
   ?>
</p>
      <a href="../admin/adminusers.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this account? User related information will also be delete.')" class="delete-btn">Delete</a>
   </div>

<?php }?>
   </div>

</section>


<div id="rentalModal" class="modal">
   <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <iframe id="rentalIframe" src="" frameborder="0"></iframe>
   </div>
</div>

<script>
   function openModal(rentalId) {
      var modal = document.getElementById('rentalModal');
      var iframe = document.getElementById('rentalIframe');
      iframe.src = '../admin/rental-details.php?rental_id=' + rentalId;
      modal.style.display = 'block';
   }

   function closeModal() {
      var modal = document.getElementById('rentalModal');
      modal.style.display = 'none';
   }
</script>

<script src="../admin/admin.js"></script>
   
</body>
</html>
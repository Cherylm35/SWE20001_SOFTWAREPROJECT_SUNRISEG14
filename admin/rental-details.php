<?php
include '../config/connect.php';

if (isset($_GET['rental_id'])) {
   $rental_id = $_GET['rental_id'];

   $select_rental_details = mysqli_query($conn, "SELECT * FROM orders WHERE id = '$rental_id'");
   $rental_row = mysqli_fetch_assoc($select_rental_details);
} else {
   header('location:adminusers.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SUNRISE - ADMINPANEL | Rental Details</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../admin/adminstyle.css">
</head>
<body>


<section class="rental-details">

   <h1 class="heading"><i class="fa fa-info-circle" aria-hidden="true"></i> Rental Details</h1>

   <div class="box-container">
      <div class="box">
         <!-- Display rental details in table format -->
         <table>
            <tr>
               <th>Rental ID</th>
               <th>Placed Date</th>
               <th>Username</th>
               <th>Name</th>
               <th>Contact No. </th>
               <th>Email</th>
               <th>Rent Duration</th>
               <th>Collect Date</th>
               <th>Products</th>
               <th>Total Amount</th>
               <th>Payment Type</th>
               <th>Payment Method</th>
               <th>Payment Status</th>
               <th>Rental Status</th>
               <!-- Add more columns as needed -->
            </tr>
            <tr>
               <td><?php echo $rental_row['id']; ?></td>
               <td><?php echo date('d-m-Y', strtotime($rental_row['placed_on'])); ?></td>
               <td><?php echo $rental_row['username']; ?></td>
               <td><?php echo $rental_row['name']; ?></td>
               <td><?php echo $rental_row['number']; ?></td>
               <td><?php echo $rental_row['email']; ?></td>
               <td><?php echo $rental_row['rent_duration']; ?></td>
               <td><?php echo $rental_row['collect_date']; ?></td>
               <td><?php echo $rental_row['total_products']; ?></td>
               <td><?php echo $rental_row['total_price']; ?></td>
               <td><?php echo $rental_row['type']; ?></td>
               <td><?php echo $rental_row['method']; ?></td>
               <td><?php echo $rental_row['payment_status']; ?></td>
               <td><?php echo $rental_row['rental_status']; ?></td>
               <!-- Add more cells as needed -->
            </tr>
            <!-- Add more rows as needed -->
         </table>
      </div>
   </div>

</section>

<script src="../admin/admin.js"></script>

</body>
</html>
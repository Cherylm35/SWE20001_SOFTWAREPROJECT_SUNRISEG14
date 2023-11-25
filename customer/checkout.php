<?php
include '../config/connect.php';

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $user_query = mysqli_query($conn, "SELECT * FROM admins WHERE id = '$user_id'");
    $user_details = mysqli_fetch_assoc($user_query);

    // Automatically fill in user details if available
    $username = $user_details['username'];
    $name = $user_details['name'];
    $email = $user_details['email'];
    $number = $user_details['phone'];
} else {
    $user_id = '';
    $username = '';
    $name = '';
    $email = '';
    $number = '';
}

if(isset($_POST['order'])){
   $username = $_POST['username'];
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $rent_duration = $_POST['rent_duration'];
   $collect_date = $_POST['collect_date'];
   $type = $_POST['type'];
   $method = $_POST['method'];
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];
   $check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");


   if(mysqli_num_rows($check_cart) > 0){
      $insert_order = mysqli_query($conn, "INSERT INTO orders(user_id, username, name, number, email, rent_duration, collect_date, type, method, total_products, total_price) VALUES('$user_id','$username','$name',
      '$number','$email','$rent_duration', '$collect_date', '$type','$method','$total_products', '$total_price')");
      $delete_cart = mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");
      $message[] = 'order placed successfully!';
   }else{
      $message[] = 'your cart is empty';
   }

}
include '../components/whatsapp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../style/style.css">

</head>
<body style='background-color:#f1faee;'>
   
<?php include '../components/bar.php'; ?>
<br><br><br><br><br><br><br><br>
<section class="checkout-orders">

   <form action="" method="POST">

   <h3>Rentals Summary</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");
         if(mysqli_num_rows($select_cart) > 0){
            while($row = mysqli_fetch_assoc($select_cart)){ 
               $cart_items[] = $row['name'].' ('.$row['price'].' x '. $row['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($row['price'] * $row['quantity']);
      ?>
         <p> <?= $row['name']; ?> <span>(<?= 'RM'.$row['price'].'x '. $row['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">Your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">Grand Total: <span>RM<?= $grand_total; ?></span></div>
      </div>

      <h3>Checkout</h3>
      <div class="flex">
        <div class="inputBox">
            <span>Username: </span>
            <input type="text" name="username" value="<?= $username; ?>" placeholder="enter your name" class="box" maxlength="20" required disabled>
         </div>
         <div class="inputBox">
            <span>Name: </span>
            <input type="text" name="name" value="<?= $name; ?>" placeholder="enter your name" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>Contact no.: </span>
            <input type="number" name="number" value="<?= $number; ?>" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 11) return false;" required>
         </div>
         <div class="inputBox">
            <span>Email: </span>
            <input type="email" name="email" value="<?= $email; ?>" placeholder="enter your email" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>Rent Duration:</span>
            <select name="rent_duration" class="box" required>
               <option value="1 week">1 week</option>
               <option value="2 week">2 week</option>
               <option value="3 week">3 week</option>
            </select>
         </div>
         <div class="inputBox">
                <span>Collect Date:</span>
                <input type="datetime-local" name="collect_date" class="box" required>
            </div>
         <div class="inputBox">
            <span>Payment Type: </span>
            <select name="type" class="box" required>
               <option value="paylater">PayLater</option>
               <option value="fullpayment">Full Payment</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Payment Method: </span>
            <select name="method" class="box" required>
               <option value="onlinebank">Online Banking</option>
               <option value="epay">E-Payment</option>
            </select>
         </div>
      </div>
      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="Place Rental">

   </form>

</section>





<script src="../admin/script.js"></script>

</body>
</html>
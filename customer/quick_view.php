<?php

include '../config/connect.php';

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};


include '../components/whatsapp.php';
?>
<?php include '../components/bar.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../style/style.css">

</head>
<body style='background-color:#f1faee;'>
   
<!--<?php include 'components/bar.php';?>-->

<section class="quick-view">
<br><br>
   <h1 class="heading">Product Details</h1>
<br>
   <?php
     if (isset($_POST['add_to_cart'])) {
      // Get product details from the form
      $product_id = $_POST['pid'];
      $sku = $_POST['sku'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $quantity = $_POST['qty'];
   
      // Insert the product into the cart
      $insert_query = "INSERT INTO cart (user_id, pid, sku, name, price, image, quantity) VALUES ('$user_id', '$product_id', '$sku', '$name', '$price', '$image', '$quantity')";
      
      // Execute the query
      $insert_result = mysqli_query($conn, $insert_query);
   
      // Check if the insertion was successful
      if ($insert_result) {
         echo
               "<script> alert('Product added to cart successfully.'); </script>";
      } else {
         echo
               "<script> alert('Failed to add product to cart: '); </script>" . mysqli_error($conn);
      }
   }
   
     $pid = $_GET['pid'];
     $select_products = mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'");
     if(mysqli_num_rows($select_products) > 0){
     while($row = mysqli_fetch_assoc($select_products)){ 
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
      <input type="hidden" name="sku" value="<?php echo $row['sku']; ?>">
      <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
      <input type="hidden" name="image" value="<?php echo $row['image_01']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img id="mainImage" src="../admin/uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
            </div>
            <div class="sub-image">
               <img src="../admin/uploaded_img.1/<?php echo $row['image_01']; ?>" alt="" onclick="changeMainImage(this.src)">
               <img src="../admin/uploaded_img.2/<?php echo $row['image_02']; ?>" alt="" onclick="changeMainImage(this.src)">
               <img src="../admin/uploaded_img.3/<?php echo $row['image_03']; ?>" alt="" onclick="changeMainImage(this.src)">
            </div>
         </div>
         <div class="content">
            <div class="sku"><span>SKU: <?php echo $row['sku']; ?></span></div>
            <div class="name"><?php echo $row['name']; ?></div>
            <div class="flex">
               <div class="price"><span>RM</span><?php echo $row['price']; ?><span></span></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <div class="details"><?php echo $row['details']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="add to cart" class="btn" name="add_to_cart">
               <a href="../customer/product.php" class="delete-btn">Continue Shopping</a>
               <!--<input class="option-btn" type="submit" name="add_to_wishlist" value="add to wishlist">-->
            </div>
         </div>
      </div>
   </form>
   <?php
      }}
   ?>

</section>













<?php include '../components/bottom.php'; ?>

<script src="../admin/script.js"></script>
<script>
   function changeMainImage(src) {
      // Get the main image element by id
      var mainImage = document.getElementById('mainImage');

      // Change the src attribute of the main image to the clicked sub-image src
      mainImage.src = src;
   }
</script>
</body>
</html>
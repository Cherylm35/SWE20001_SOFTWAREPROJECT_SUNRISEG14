<?php

include '../config/connect.php';

$id = $_GET['get'];

if(isset($_POST['update'])){
   $name = $_POST['name'];
   $price = $_POST['price'];
   $details = $_POST['details'];
   $sku = $_POST['sku']; // Add SKU input

   // Check if new images were uploaded
   $new_images_uploaded = false;
   $image_01 = $_FILES['image_01']['name'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'uploaded_img.1/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = 'uploaded_img.2/'.$image_02;

   $image_03 = $_FILES['image_03']['name'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = 'uploaded_img.3/'.$image_03;

   if(!empty($image_01) || !empty($image_02) || !empty($image_03)){
      $new_images_uploaded = true;
   }

   if(empty($name) || empty($details) || empty($price)){
      echo
            "<script> alert('Please fill out all fields!'); </script>";
      
   } else {
      if($new_images_uploaded){
         // Include SKU in the update query
         $update_data = "UPDATE products SET name='$name', details='$details', price='$price', sku='$sku', image_01='$image_01', image_02='$image_02', image_03='$image_03' WHERE id = '$id'";
         $upload = mysqli_query($conn, $update_data);
         if($upload){
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            move_uploaded_file($image_tmp_name_03, $image_folder_03);
            header('location:adminproducts.php');
         } else {
            echo
            "<script> alert('Failed to update. Please try again.'); </script>";
         
            /*$message[] = 'Failed to update. Please try again.';*/
         }
      } else {
         $update_data = "UPDATE products SET name='$name', details='$details', price='$price', sku='$sku' WHERE id = '$id'";
         $upload = mysqli_query($conn, $update_data);
         if($upload){
            header('location:adminproducts.php');
         } else {
            echo
            "<script> alert('Failed to update. Please try again.'); </script>";
         }
      }
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SUNRISE - ADMINPANEL | PRODUCT EDIT</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../admin/adminstyle.css">

</head>
<body>
<?php /*include '../admin/adminheader.php'; */?>

<section class="update-product">
<?php
      $select = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$id'");
      if($row = mysqli_fetch_assoc($select)){
   ?>
   <h1 class="heading"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Product</h1>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="old_image_01" value="<?php echo $row['image_01']; ?>">
      <input type="hidden" name="old_image_02" value="<?php echo $row['image_02']; ?>">
      <input type="hidden" name="old_image_03" value="<?php echo $row['image_03']; ?>">
      <div class="image-container">
         <div class="main-image">
            <img src="uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
         </div>
         <div class="sub-image">
            <img src="uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
            <img src="uploaded_img.2/<?php echo $row['image_02']; ?>" alt="">
            <img src="uploaded_img.3/<?php echo $row['image_03']; ?>" alt="">
         </div>
      </div>
      <span>Product SKU</span>
      <input type="text" name="sku" required class="box" maxlength="100" placeholder="enter product SKU" value="<?php echo $row['sku']; ?>">
      <span>Product Name</span>
      <input type="text" name="name" required class="box" maxlength="100" placeholder="enter product name" value="<?php echo $row['name']; ?>">
      <span>Product Price (RM)</span>
      <input type="number" name="price" required class="box" min="0" max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" value="<?php echo $row['price']; ?>">
      <span>Product Details</span>
      <textarea name="details" class="box" required cols="30" rows="10"><?php echo $row['details']; ?></textarea>
      <span>Product Image 01</span>
      <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>Product Image 02</span>
      <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>Product Image 03</span>
      <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
         }
      }
      ?>
      <div class="flex-btn">
         <input type="submit" name="update" class="btn" value="Update">
         <a href="../admin/adminproducts.php" class="delete-btn">Cancel</a>
      </div>
      </form>

</section>
<?php }; ?>












<script src="../admin/admin.js"></script>
   
</body>
</html>


<?php

include '../config/connect.php';

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};


include '../components/whatsapp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color:#f1faee;">
   
<?php include '../components/bar.php'; ?>
<br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>   <br>
<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>

<section class="products" style="padding-top: 0; min-height:100vh;">

   <div class="box-container">
   <?php
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_box}%'");
        if(mysqli_num_rows($select_products) > 0){
            while($row = mysqli_fetch_assoc($select_products)){ 
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="sku" value="<?php echo $row['sku']; ?>">
      <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
      <input type="hidden" name="image" value="<?php echo $row['image_01']; ?>">

      <a href="quick_view.php?pid=<?php echo $row['id']; ?>" class="fas fa-eye"></a>
      <img src="../admin/uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
      <div class="name"><?php echo $row['name']; ?></div>
      <div class="flex">
         <div class="price"><span>RM</span><?php echo $row['price']; ?><span></span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no products found!</p>';
      }
   }
   ?>

   </div>

</section>




<script src="../js/script.js"></script>

</body>
</html>
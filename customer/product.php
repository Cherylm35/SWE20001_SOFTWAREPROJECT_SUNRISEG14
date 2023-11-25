<?php
include '../config/connect.php';
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};


include '../components/whatsapp.php';
?>

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="../style/style.css">
</head>
<style>
P{
    position:absolute;
    left:77px;
    top:130px;
    font-size:23px;
}
p1{
    position:absolute;
    left:60px;
    top:180px;
    font-size:23px;
}
p2{
    position:absolute;
    left:65px;
    top:230px;
    font-size:19px;
}
p3{
    position:absolute;
    left:60px;
    top:280px;
    font-size:19px;
}
.search-bar {
    margin-bottom: 20px;
}

.search-bar form {
    display: flex;
    align-items: center;
}

.search-bar input[type="text"] {
    padding: 8px;
    font-size: 14px;
    box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
    border-radius: .5rem;
}

.search-bar button {
    padding: 8px 12px;
    font-size: 14px;
    margin-left: 8px;
    background-color: #00B4D8; /* Green */
    color: white;
    border: none;
    cursor: pointer;
    box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
    border-radius: .5rem;
}

/* Sort Buttons Styles */
.sort-buttons {
    margin-bottom: 20px;
}

.sort-buttons form {
    display: flex;
    align-items: center;
}

.sort-buttons label {
    font-size: 14px;
    margin-right: 8px;
}

.sort-buttons select {
    padding: 8px;
    font-size: 14px;
    box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
    border-radius: .5rem;
}

.sort-buttons button {
    padding: 8px 12px;
    font-size: 14px;
    margin-left: 8px;
    background-color: #00B4D8; /* Green */
    color: white;
    border: none;
    cursor: pointer;
    box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
    border-radius: .5rem;
}
</style>
<body style="background-color:#f1faee;">
<?php include '../components/bar.php';?>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = none;"></i> </div>';
   };
};

?>
<section class="products">
<br><br><br>
<div class="search-bar">
      <form method="get">
         <input type="text" name="search" placeholder="Search products">
         <button type="submit">Search</button>
      </form>
   </div>

   <!-- Sort Buttons -->
   <div class="sort-buttons">
      <form method="get">
         <label>Sort by:</label>
         <select name="sort">
            <option value="name_asc">Ascending: (A-Z)</option>
            <option value="name_desc">Descending: (Z-A)</option>
            <option value="price_asc">Price: (Low - High)</option>
            <option value="price_desc">Price (High - Low)</option>
         </select>
         <button type="submit">Sort</button>
      </form>
   </div>
   
<div class="box-container">
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
// Define the default SQL query
$sqlQuery = "SELECT * FROM products WHERE availability = 'available'";

// Check if search parameter is set
if (isset($_GET['search'])) {
   $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
   $sqlQuery .= " AND (name LIKE '%$searchTerm%' OR sku LIKE '%$searchTerm%')";
}

// Check if sort parameter is set
if (isset($_GET['sort'])) {
   $sortOrder = $_GET['sort'];
   $sortFields = [
      'name_asc' => 'name ASC',
      'name_desc' => 'name DESC',
      'price_asc' => 'price ASC',
      'price_desc' => 'price DESC',
   ];

   if (array_key_exists($sortOrder, $sortFields)) {
      $sqlQuery .= " ORDER BY " . $sortFields[$sortOrder];
   }
}

// Now execute the query
$select = mysqli_query($conn, $sqlQuery);
if(mysqli_num_rows($select) > 0){
while($row = mysqli_fetch_assoc($select)){ 
?>
   <form action="" method="post" class="box" style="height:450px;">
      <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="sku" value="<?php echo $row['sku']; ?>">
      <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
      <input type="hidden" name="image" value="<?php echo $row['image_01']; ?>">
      <a href="quick_view.php?pid=<?php echo $row['id']; ?>" class="fas fa-eye"></a>
      <img src="../admin/uploaded_img.1/<?php echo $row['image_01']; ?>" alt="" style="width:400px; height:200px;">
      <div class="sku"><span>SKU: <?php echo $row['sku']; ?></span></div>
      <div class="name"><?php echo $row['name']; ?></div>
      <div class="flex">
         <div class="price"><span>RM</span><?php echo $row['price']; ?></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php }}else{
      echo '<p class="empty">no products found!</p>';
   }?>
</div>
</section>
<?php include "../components/bottom.php";?>

<script src="../js/script.js"></script>
</body>
</html>
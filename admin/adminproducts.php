<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/connect.php';
if(isset($_POST['add_product'])){

   $sku = $_POST['sku'];
   $name = $_POST['name'];
   $details = $_POST['details'];
   $price = $_POST['price'];

   $image_01 = $_FILES['image_01']['name'];
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'uploaded_img.1/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = 'uploaded_img.2/'.$image_02;

   $image_03 = $_FILES['image_03']['name'];
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = 'uploaded_img.3/'.$image_03;

   if(empty($sku) ||empty($name) || empty($details) || empty($price) || empty($image_01) || empty($image_02) || empty($image_03)){
      $message[] = 'Please fill in all';
   }else{
      $insert = "INSERT INTO products(sku, name, details, price, image_01, image_02, image_03) VALUES('$sku','$name', '$details', '$price','$image_01','$image_02','$image_03')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         move_uploaded_file($image_tmp_name_02, $image_folder_02);
         move_uploaded_file($image_tmp_name_03, $image_folder_03);
         echo
            "<script> alert('New product added successfully!'); </script>";

      }else{
         echo
            "<script> alert('Failed to add the product.'); </script>";
         
      }
   }

}

if (isset($_POST['product_id']) && isset($_POST['availability'])) {
   $productId = $_POST['product_id'];
   $availability = $_POST['availability'];

   // Validate the data
   if (!is_numeric($productId) || !in_array($availability, ['available', 'unavailable'])) {
       echo "<script> alert('Invalid data.'); </script>";
   } else {
       // Update the availability in the database
       $updateQuery = "UPDATE products SET availability = '$availability' WHERE id = $productId";
       $result = mysqli_query($conn, $updateQuery);

       if ($result) {
         echo "success";
     } else {
         echo "error: " . mysqli_error($conn); // This will display the MySQL error, if any.
     }
     die(); // Stop script execution here
   }
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header('location:adminproducts.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SUNRISE - ADMINPANEL | PRODUCTS</title>
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../admin/adminstyle.css">

   <style>
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

</head>
<body>

<?php include '../admin/adminheader.php'; ?>

<section class="add-products">

   <h1 class="heading"><i class="fa fa-plus-circle" aria-hidden="true"></i> product</h1>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" novalidate>
      <div class="flex">
         <div class="inputBox">
            <span>Product SKU (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="Enter product SKU" name="sku">
         </div>
         <div class="inputBox">
            <span>Product Name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="Enter product name" name="name">
         </div>
         <div class="inputBox">
            <span>Product Price (required)</span>
            <input type="number" step="any" min="0" class="box" required max="9999999999" placeholder="Enter product price" onkeypress="if(this.value.length == 10) return false;" name="price" formnovalidate>
         </div>
        <div class="inputBox">
            <span>Image 01 (required)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 02 (required)</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 03 (required)</span>
            <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
         <div class="inputBox">
            <span>Product Details (required)</span>
            <textarea name="details" placeholder="Enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      
   <input type="submit" value="add product" class="btn" name="add_product">
   </form>

</section>

<section class="show-products">
   <h1 class="heading">products catalog</h1>
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
            <option value="availability_asc">Availability: (A-Z)</option>
            <option value="availability_desc">Availability: (Z-A)</option>
         </select>
         <button type="submit">Sort</button>
      </form>
   </div>
   <div class="box-container">
   <?php
      // Define the default SQL query
      $sqlQuery = "SELECT * FROM products";

      // Check if search parameter is set
      if (isset($_GET['search'])) {
         $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
         $sqlQuery .= " WHERE name LIKE '%$searchTerm%' OR sku LIKE '%$searchTerm%'";
      }

      // Check if sort parameter is set
      if (isset($_GET['sort'])) {
         $sortOrder = $_GET['sort'];
         $sortFields = [
            'name_asc' => 'name ASC',
            'name_desc' => 'name DESC',
            'price_asc' => 'price ASC',
            'price_desc' => 'price DESC',
            'availability_asc' => 'availability ASC',
            'availability_desc' => 'availability DESC'
         ];

         if (array_key_exists($sortOrder, $sortFields)) {
            $sqlQuery .= " ORDER BY " . $sortFields[$sortOrder];
         }
      }

      $select = mysqli_query($conn, $sqlQuery);

      while ($row = mysqli_fetch_assoc($select)) {
      ?>
   <div class="box">
      <img src="uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
      <div class="sku"><span>SKU: <?php echo $row['sku']; ?></span></div>      
      <div class="name"><?php echo $row['name']; ?></div>
      <div class="name"><span>RM<?php echo $row['price']; ?></span></div>
      <div class="details"><span><?php echo $row['details']; ?></span></div>
      <div class="availability">
      <span>Availability:</span>
      <select name="availability" class="box" onchange="updateAvailability(<?php echo $row['id']; ?>, this.value)">
         <option value="available" <?php echo ($row['availability'] == 'available') ? 'selected' : ''; ?>>Available</option>
         <option value="unavailable" <?php echo ($row['availability'] == 'unavailable') ? 'selected' : ''; ?>>Unavailable</option>
      </select>
   </div>
      <div class="flex-btn">
         <a href="../admin/admineditproducts.php?get=<?php echo $row['id']; ?>" class="option-btn">edit</a>
         <a href="../admin/adminproducts.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
   </div>
   <?php } ?>
   </div>

</section>








<script src="../admin/admin.js"></script>
<script>
    function updateAvailability(productId, availability) {
        console.log('Updating availability for product ID:', productId, 'to', availability);

        // AJAX request to update availability
        $.ajax({
            type: 'POST',
            url: '../admin/adminproducts.php', // The same page (self)
            data: {
                product_id: productId,
                availability: availability
            },
            success: function (response) {
                console.log('AJAX Response:', response);
                
                if (response === 'success') {
                    alert('Availability updated successfully!');
                } else {
                    alert('Failed to update availability. Error: ' + response);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('Failed to update availability. Please try again.');
            }
        });
    }
</script>
</body>
</html>
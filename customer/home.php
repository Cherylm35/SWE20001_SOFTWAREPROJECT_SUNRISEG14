<?php
include '../config/connect.php'; 
include '../components/whatsapp.php';  
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}else{
  $user_id = '';
};
/* include 'components/wishlist_cart.php'; */
?>
<html>
<head>
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<style>
.mySlides {display: none}
img {vertical-align: middle;}

p{
   position:relative;
   text-align:center;
   font-size:20px;
}
.slideshow-container {
  max-width: 770px;
  max-height: 770px;
  position: relative;
  margin: auto;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #1d1d1d;
}

.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
.home-bg {
            background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('https://hips.hearstapps.com/hmg-prod/images/world-oceans-day-1528139999.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

 .home-bg .home{
    display: flex;
    align-items: center;
    min-height: 60vh;
 }
 
 .home-bg .home .content{
    width: 50rem;
 }
 
 .home-bg .home .content span{
    color:var(--blue);
    font-size: 2.5rem;
 }
 
 .home-bg .home .content h3{
    font-size: 3rem;
    text-transform: uppercase;
    margin-top: 1.5rem;
    color:var(--white);
 }
 
 .home-bg .home .content p{
    font-size: 1.6rem;
    padding:1rem 0;
    line-height: 2;
    color:var(--light-color);
 }
 
 .home-bg .home .content a{
    display: inline-block;
    width: auto;
 }

 @media (max-width:450px){

html{
   font-size: 50%;
}

.flex-btn{
   flex-flow: column;
   gap:0;
}

.title{
   font-size: 3rem;
}

.home-bg{
 background-position: left;
}

.home-bg .home{
 justify-content: center;
 text-align: center;
}
}

.form .box{
  height: 350px;
  width: 410px;
}



</style>
</head>
<body style="background-color:#f1faee;">
<?php include '../components/bar.php';?>
<br><br><br>
<div class="home-bg" style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('https://hips.hearstapps.com/hmg-prod/images/world-oceans-day-1528139999.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">
            <section class="home">
                <div class="content">
                    <span style="color:lightblue;font-size: 2.5rem;">Unlock the Ocean's Secrets with Us!</span>
                    <h3>Picked By The Best, For The Best.</h3>

                </div>
            </section>
</div>
<br>
<p >Book Your Diving Equipment With Us<p>
<div class="products">

<h1 class="heading">Feature Products</h1>

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
</div>
<?php include '../components/bottom.php';?>
</body>
</html> 
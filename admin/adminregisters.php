<?php

include '../config/connect.php';
$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:../admin/adminlogin.php');
}

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];
   
   $select_admin = mysqli_query($conn, "SELECT * FROM `admins` WHERE name = '$name'");
   if(mysqli_num_rows($select_admin) > 0){
      echo
            "<script> alert('Username already exist!'); </script>";
   }else{
      if($pass != $cpass){
         echo
            "<script> alert('Confirm password not matched!'); </script>";
      }else{
         $insert_admin = mysqli_query($conn, "INSERT INTO `admins`(name, username, email, phone, password,userLevel) VALUES('$name','$username','$email', '$phone','$cpass','admin')");
         echo
            "<script> alert('New admin registered successfully!'); </script>";
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
   <title>register admin</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../admin/adminstyle.css">

</head>
<body>

<?php include '../admin/adminheader.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" required placeholder="enter your name" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="username" required placeholder="enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="email" required placeholder="enter your email" maxlength="40"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="phone" required placeholder="enter your contact no." maxlength="40"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      
      <div class="flex-btn">
         <input type="submit" value="register now" class="btn" name="submit">
         <a href="../admin/adminadmins.php" class="delete-btn">Cancel</a>
      </div>
   </form>

</section>












<script src="../admin/admin_script.js"></script>
   
</body>
</html>
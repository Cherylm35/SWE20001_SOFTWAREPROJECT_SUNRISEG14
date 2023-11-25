<?php
include '../SWE20001_SOFTWAREPROJECT_SUNRISEG14/config/connect.php';

if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];
   $select_admin = mysqli_query($conn, "SELECT * FROM admins WHERE name = '$name'");
   if(mysqli_num_rows($select_admin) > 0){
      echo
            "<script> alert('Username already exist!'); </script>";
   }else{
      if($pass != $cpass){
         echo
            "<script> alert('Confirm password not matched!'); </script>";
      }else{
         $insert_admin = mysqli_query($conn, "INSERT INTO admins(name, username, email, phone, password) VALUES('$name','$username','$email', '$phone','$cpass')");
         echo
            "<script> alert('New user registered successfully!'); </script>";
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
   <title>SUNRISE | ADMIN REGISTER</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link rel="stylesheet" href="../SWE20001_SOFTWAREPROJECT_SUNRISEG14/style/loginstyle.css">

</head>
<body>
<div class="login">
   <img src="https://i.pinimg.com/originals/be/42/31/be4231286f09839714ba3c678f8aba9d.jpg" alt="login image" class="login__img">

   <form action="" method="post" class="login__form">
      <h3>register now</h3>
      <div class="login__content">
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="name" class="login__input" placeholder=" " required >
                     <label for="name" class="login__label">Full Name</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="username" class="login__input" placeholder=" " required >
                     <label for="username" class="login__label">UserName</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="email" class="login__input" placeholder=" " required >
                     <label for="email" class="login__label">Email</label>
                  </div>
               </div>
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="phone" class="login__input" placeholder=" " required >
                     <label for="phone" class="login__label">Contact No. </label>
                  </div>
               </div>
               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name="pass" class="login__input" id="login-pass" placeholder=" " required >
                     <label for="pass" class="login__label">Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name="cpass" class="login__input" id="login-pass2" placeholder=" " required >
                     <label for="cpass" class="login__label">Confirm Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye2"></i>
                  </div>
               </div>

            </div>

            <div class="login__check">
               <div class="login__check-group">
                  <a href="../SWE20001_SOFTWAREPROJECT_SUNRISEG14/login.php" class="login__forgot">Back to Sign In</label>
               </div>
            </div>

            <button type="submit" name="submit" class="login__button">Register</button>
         </form>
      </div>








<script src="../SWE20001_SOFTWAREPROJECT_SUNRISEG14/login.js"></script>
   
</body>
</html>
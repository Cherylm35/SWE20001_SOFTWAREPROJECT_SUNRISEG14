<?php
require '../config/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: ../admin/adminhome.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: ../admin/adminhome.php");
    }
    else{
      echo
      "<script> alert('Oops! Invalid password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('Oops! Invalid username or email'); </script>";
  }
}
?>


<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="../style/loginstyle.css">

      <title>SUNRISE - ADMINPANEL | LOGIN</title>
   </head>
   <body>
      <div class="login">
         <img src="https://i.pinimg.com/originals/be/42/31/be4231286f09839714ba3c678f8aba9d.jpg" alt="login image" class="login__img"> <!--https://s.tmimgcdn.com/scr/800x500/328500/blue-wave-water-background-design-vector-v16_328544-original.jpg-->

         <form method="post" id="validate_form" action="" class="login__form">
            <h1 class="login__title">WELCOME BACK!</h1>
            <div class="login__content">
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="usernameemail" class="login__input" placeholder=" " required >
                     <label for="email" class="login__label">Username or Email</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name="password" class="login__input" id="login-pass" placeholder=" " required >
                     <label for="password" class="login__label">Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-group">
                  <input type="checkbox" class="login__check-input">
                  <label for="" class="login__check-label">Remember me</label>
               </div>

               <a href="../admin/forgotpassword.php" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" name="submit" class="login__button">Login</button>
         </form>
      </div>

      
      <!--=============== MAIN JS ===============-->
      <script src="../admin/login.js"></script>
   </body>
</html>
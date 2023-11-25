<?php
include '../SWE20001_SOFTWAREPROJECT_SUNRISEG14/config/connect.php';
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
 }else{
   $user_id = '';
 };

if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"]; 
      if($row['userLevel'] == 'admin'){

            header('location:../SWE20001_SOFTWAREPROJECT_SUNRISEG14/admin/adminhome.php');
   
         }elseif($row['userLevel'] == 'user'){
            $_SESSION['user_id'] = $row['id'];
            header('location:../SWE20001_SOFTWAREPROJECT_SUNRISEG14/customer/home.php');
   
         }
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
      <link rel="stylesheet" href="../SWE20001_SOFTWAREPROJECT_SUNRISEG14/style/loginstyle.css">

      <title>SUNRISE - LOGIN</title>
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
                  <a href="../SWE20001_SOFTWAREPROJECT_SUNRISEG14/register.php" class="login__forgot">Don't have account?</label>
               </div>
            </div>
            
            <button type="submit" name="submit" class="login__button">Login</button>
         </form>
      </div>

      
      <!--=============== MAIN JS ===============-->
      <script src="../SWE20001_SOFTWAREPROJECT_SUNRISEG14/login.js"></script>
   </body>
</html>
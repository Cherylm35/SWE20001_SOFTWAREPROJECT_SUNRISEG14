<?php
require '../config/connect.php';
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}else{
  $user_id = '';
};

if(isset($_POST['submit'])){
  $prev_pass = $_POST['prev_pass'];
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $confirm_pass =$_POST['confirm_pass'];

  if(empty($old_pass)){
     $message[] = 'please enter old password!';
  }elseif($old_pass != $prev_pass){
     $message[] = 'old password not matched!';
  }elseif($new_pass != $confirm_pass){
     $message[] = 'confirm password not matched!';
  }else{
     if (!empty($new_pass)){
        $update_user_pass = mysqli_query($conn, "UPDATE `admins` SET password = '$confirm_pass' WHERE id='$user_id'");
        $message[] = 'password updated successfully!';
     }else{
        $message[] = 'please enter a new password!';
     }
  }
  
}
include '../components/whatsapp.php';
?>
<html>
<style>
a3 {
  left: 50px;
  top: 50px;
  position: relative;
  font-size: 20px;
}
.img{
top:90px;
left:95px;
position: relative;
}
.vl {
  border-left: 3px solid black;
  height: 600px;
  left:300px;
  bottom:-20px;
  position:relative;
}
p {
  left: 100px;
  top: -500px;
  position: relative;
  font-size: 16px;
}
p1{
  left: 500px;
  top: -650px;
  position: relative;
  font-size: 23px;
}
p2{
  left: 650px;
  top: -650px;
  position: relative;
  font-size: 23px;
}
p3{
  left: 390px;
  top: -690px;
  position: relative;
  font-size:23px;
}
.table1 {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  position:absolute;
  left: 390px;
  top: 270px;
  border: 0px solid black;
  font-size:17px;
}
.orders-container {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap; /* This will allow items to wrap into the next line if the row is full */
  justify-content: space-around; /* This will space out the boxes evenly */
  align-items: stretch; /* This will stretch the items to fill the container if needed */
}

.box {
  flex-basis: 20%; /* Adjust this value to control the width of each box */
  margin: 10px; /* This adds some space around each box */
  border: 1px solid black; /* Example border, adjust as needed */
  padding: 10px; /* Padding inside each box */
  box-shadow: 0 2px 5px rgba(0,0,0,0.2); /* Optional: Adds a shadow for better visibility */
}

</style>
<body style="background-color:#f1faee;">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include '../components/bar.php';?>
<br><br><br>
<a3><a href="account.php" alt="" style="color:black;"> My Account </a></a3>
<div class="img">
<img src="account.png" alt="Girl in a jacket" width="50" height="50" position="10 10">
</div>
<div class="vl"></div>
<p>Account Details</p>

<p><a href="order.php" style="color:black;">Orders</a></p>
<p><a href="logout.php" style="color:black;">Log out</a></p>
<?php
      $select = mysqli_query($conn, "SELECT * FROM admins where id='$user_id'");
         while($row = mysqli_fetch_assoc($select)){ 
   ?>


<form action="" method="post" onSubmit="return valid();">

<table class="table1">
<tr>
  <th>Name</th>
</tr>
<tr>
  <td><?php echo $row['name']; ?></td>
  <td></td>
</tr>
<tr>
<th>Username</th>
</tr>
<tr>
  <td><?php echo $row['username']; ?></td>
  <td></td>
</tr>
<tr>
<th>Email</th>
</tr>
<tr>
  <td><?php echo $row['email']; ?></td>
  <td></td>
</tr>
<tr>
<th>Contact Number</th>
</tr>
<tr>
  <td><?php echo $row['phone']; ?></td>
  <td></td>
</tr>
<tr>
<td><div class="flex-btn"> 
         <?php
            if($row['id'] == $user_id){
               echo '<a href="../customer/usereditprofile.php" class="option-btn">Edit</a>';
            }
         ?>
      </div></td>
</tr>
</table>
<?php
         }
   ?>
</form>
<?php include '../components/bottom.php';?>
</body>
</html>


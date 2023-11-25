<header class="header">

<section class="flex">

    <a href="../admin/adminhome.php" class="logo">Admin<span>Panel</span></a>

    <nav class="navbar">
        <a href="../admin/adminhome.php">Home</a>
        <a href="../admin/adminproducts.php">Products</a>
        <a href="../admin/adminrentals.php">Rentals</a>
        <a href="../admin/adminadmins.php">Admins</a>
        <a href="../admin/adminusers.php">Users</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user-cog"></div>
    </div>

    <div class="profile">
        <?php
            $id = $_SESSION["id"];
            $result = mysqli_query($conn, "SELECT * FROM admins WHERE id = $id");
            $row = mysqli_fetch_assoc($result);
         ?>
         <p><span>User: <?php echo $row['name']; ?></span></p>
        <p></p>
        <a href="../admin/admineditprofile.php" class="btn">Edit Profile</a>
        <div class="flex-btn">
            <a href="../admin/adminregisters.php" class="option-btn">Register</a>
            <a href="../admin/adminadmins.php" class="option-btn">Admins</a>
        </div>
        <a href="../admin/adminlogout.php" class="delete-btn" onclick="return confirm('Are you sure you want to log out?');">Logout</a> 
    </div>

</section>

</header>
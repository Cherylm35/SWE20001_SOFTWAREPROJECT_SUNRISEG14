<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Responsive Navigation Bar</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            }
        html {
            font-size: 62.5%;
            background-color:beige;
            }
        *:not(i) {
            font-family: "Poppins", sans-serif;
            }
        header {
            position: fixed;
            width: 100%;
            top:0;
            background-color: #1d1d1d;
            padding: 2rem 5rem;
            z-index: 2;
            box-shadow: saddlebrown;
            justify-content: space-between;
            }
        nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 6rem;
            }
        nav a {
            font-size: 14px;
            text-decoration: none;
            }
        nav a#logo img {
            max-width: 130px;
            max-height: 60px;
            right:730px;
            position:relative;
            }
        nav ul a {
            color: white;
            font-weight: bold;
            }
        nav ul a:hover {
            border-bottom: 2px solid orangered;
            }
        section#home {
            height: 100vh;
            display: grid;
            place-items: center;
            }
        h1 {
            font-size: 4rem;
            }
        #ham-menu {
            display: none;
            }
        nav ul.active {
            left: 0;
            }
        @media only screen and (max-width: 991px) {
            html {
                font-size: 56.25%;
            }
            header {
                padding: 2.2rem 5rem;
            }
            }
        @media only screen and (max-width: 767px) {
            html {
                font-size: 50%;
            }
            #ham-menu {
                display: block;
                color: white;
            }
            nav a#logo,
            #ham-menu {
                font-size: 3.2rem;
            }
            nav ul {
                background-color: #1d1d1d;
                position: fixed;
                left: -100vw;
                top: 73.6px;
                width: 100vw;
                height: calc(100vh - 73.6px);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                transition: 1s;
                gap: 0;
            }
            }
        @media only screen and (max-width: 575px) {
            html {
                font-size: 46.87%;
            }
            header {
                padding: 2rem 3rem;
            }
            nav ul {
                top: 65.18px;
                height: calc(100vh - 65.18px);
            }
        }
        .search-container {
        left:430px;
        position:relative;
        }
@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
    
  }
}

    </style>
    
    <link
      rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <header>
      <nav>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
            <a href="../customer/home.php" class="active"><i aria-hidden="true"></i> Home</a>
            <a href="../customer/product.php"><i aria-hidden="true"></i> Products</a>
            <a href="../customer/account.php"><i aria-hidden="true"></i> Account</a>
        </ul>
        <a href="../customer/home.php" id="logo"><img src="../customer/Logo.png" alt="" height="70" width="130"></a>
        <div class="icons">
         <?php
            $count_cart_items = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");
            $total_cart_counts = mysqli_num_rows($count_cart_items);
         ?>
         <div class="btn.1" style='background-color: #1d1d1d; position:absolute;right:30px; top:40px;'>
         <a href="../customer/search_page.php"><i class="fas fa-search"style="color:white; backgound-color:#1d1d1d;"></i></a>
         <a href="../customer/cart.php"><i class="fas fa-shopping-cart" style="color:white; backgound-color:#1d1d1d;"></i><span style="color:white;"><?php echo $total_cart_counts; ?></span></a>
         </div>
      </div>
      </nav>
    </header>

    
    <a href="https://wa.me/01136282699" target="_blank"><i class="fa-3x fa-brands fa-whatsapp"></i></a>
    <script>
    //responsive nav  bar
        let hamMenuIcon = document.getElementById("ham-menu");
        let navBar = document.getElementById("nav-bar");
        let navLinks = navBar.querySelectorAll("li");
        hamMenuIcon.addEventListener("click", () => {
        navBar.classList.toggle("active");
        hamMenuIcon.classList.toggle("fa-times");
        });
        navLinks.forEach((navLinks) => {
        navLinks.addEventListener("click", () => {
            navBar.classList.remove("active");
            hamMenuIcon.classList.toggle("fa-times");
        });
        });
    
    
    </script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <link rel="stylesheet" href="style/style.css">
    <title>Product</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 33.33%;
            padding: 5px;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .price {
            color: grey;
            font-size: 22px;
        }

        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }

        .threeblocks-image {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            background-color: #f5f5f5; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); 
        }
        
        /* Adjust image sizes */
        .card img {
            width: 100%;
        }

        body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
    </style>
</head>
<body>
<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Product</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16">Mail</div>
    <div class="w3-center w3-padding-16">Product</div>
  </div>
</div>
  
<section class="threeblocks-image">
    <div class="column">
        <div class="card">
            <img src="https://scubawarehouse.com.my/wp-content/uploads/2018/09/luxfer-s80-aluminium-tank.jpg" alt="Scuba Cylinder">
            <h1>Scuba Cylinder</h1>
            <p class="price">RM 25 per tank</p> 
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img src="https://www.eastwood.com/media/catalog/product/cache/f6a6ad9633d4f4199f5a61178e3b058e/_/p/_p_2_p20481a_regulators_1.jpg" alt="Regulator">
            <h1>Regulator</h1>
            <p class="price">RM 30.00</p> 
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img src="https://scubawarehouse.com.my/wp-content/uploads/2020/06/dive1-formula-bcd-Red-.jpeg" alt="BCD (buoyancy compensator device)">
            <h1>BCD (buoyancy compensator device)</h1>
            <p class="price">RM 30.00</p>
            <p><button>Add to Cart</button></p>
        </div>
    </div>
</section>

<section class="threeblocks-image">
    <div class="column">
        <div class="card">
            <img src="https://img.fruugo.com/product/2/47/389059472_max.jpg" alt="Scuba Cylinder">
            <h1>Scuba Mask & Snorkel</h1>
            <p class="price">RM 15.00</p> 
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img src="https://scubawarehouse.com.my/wp-content/uploads/2020/05/scubapro-definition-wetsuit.jpg" alt="Wetsuit">
            <h1>Wetsuit</h1>
            <p class="price">RM 15.00</p> 
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img src="https://www.swimshop2u.com/cdn/shop/products/swimshop2u-1.05.037-Image-Studio-Blue.Yellow-XS-1_1000x.jpg?v=1609234443" alt="Fins">
            <h1>Fins</h1>
            <p class="price">RM 10.00</p>
            <p><button>Add to Cart</button></p>
        </div>
    </div>
</section>

<section class="threeblocks-image">
    <div class="column">
        <div class="card">
            <img src="https://ww2.scubapro.com/media/10919/a80bd2e0-2e2e-4286-8a01-68ddf25b0c2e-pocket_weight_belt.png" alt="Weight Belt">
            <h1>Weight Belt</h1>
            <p class="price">RM 8.00</p> 
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img src="https://static.wixstatic.com/media/9356cf_e71f82f8adec4809a04e65f5e2d63fbd~mv2.jpg/v1/fill/w_980,h_980,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9356cf_e71f82f8adec4809a04e65f5e2d63fbd~mv2.jpg" alt="Corrective Lens">
            <h1>Corrective Lens</h1>
            <p class="price">RM 50.00</p> 
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img src="https://scubawarehouse.com.my/wp-content/uploads/2020/01/scubapro-nova-850r-dive-light.jpg" alt="Dive Torch without batteries">
            <h1>Dive Torch without batteries</h1>
            <p class="price">RM 25.00</p>
            <p><button>Add to Cart</button></p>
        </div>
    </div>
    </section>

<section class="threeblocks-image">
    <div class="column">
        <div class="card">
            <img src="https://scubawarehouse.com.my/wp-content/uploads/2020/01/scubapro-nova-850r-dive-light.jpg" alt="Dive Torch without batteries">
            <h1>Air Refill (1 times)</h1>
            <p class="price">RM 25.00</p>
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img src="https://www.smacodive.com/wp-content/uploads/2022/06/S700%E7%BB%BF%E8%89%B2.jpg" alt="Air Refill (1 times)">
            <h1>Dive Computer</h1>
            <p class="price">RM 25.00</p>
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img src="https://www.planetscuba.com.my/wp-content/uploads/2020/05/wrist-compass-1.png" alt="Wrist  Compass">
            <h1>Wrist  Compass</h1>
            <p class="price">RM 25.00</p>
            <p><button>Add to Cart</button></p>
        </div>
    </div>
   
</section>

<section

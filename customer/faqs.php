<?php
include '../config/connect.php';
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
include '../components/whatsapp.php';
include '../components/bar.php';
?>
<html>
    <style>
        p{
            postion:relative;
            left:-100px;
            color:black;
            font-size:17px;
        }
        h1{
            color:black;
            font-size:27px;
        }
    </style>
<body style="background-color:#f1faee;">
<br><br><br><br>
<h1>General Questions</h1>
<p>Q: How long will I receive the items after placed order?</p>
<p>A: Within 7days.</p>
<br>
<p>Q: I need it badly in these days, is it possible to arrange same day delivery for me?</p>
<p>A: If you badly need to use,you need to tell me in whatsapp or email me so that i can help you ship as soon as possible.</p>
<br>
<p>Q: What is the cut-off time for same day delivery orders?</p>
<p>A: You will need to place your order before 12pm for the same-day delivery service. If your order is placed after 12pm, we will arrange delivery on the next working day.</p>
<br>
<p>Q: What if the item I ordered is not in stock and I need it today?</p>
<p>A: We will contact you to inform that the item you ordered is not in stock, you can choose another product for the delivery.</p>
<br>
<p>Q: Do you provide international delivery?</p>
<p>A: Yes, we do.</p>
<br>
<h1>How to apply for return & exchange?</h1>
<p>Send a photo of the defective/wrong item along with your order number to our whatsapp (Elec.Store) through Whatsapp.</p>
<p>Wait for our reply (we always try to reply as soon as we can).</p>
<p>Our customer service team will inform customers within 7-14 working days after inspection.</p>
<br>
<h1>Refunds</h1>
<p>Please take note that we do not provide refunds on any purchase made.</p>
<?php include '../components/bottom.php'?>
</body>
</html>
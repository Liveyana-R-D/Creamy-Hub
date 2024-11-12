<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if user is not logged in
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style_home.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creamy Hub</title>
    <style>
        body {
            background: url(pooh.jpg) no-repeat ;

            background-size: cover;

            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            
        }
        .welcome-message {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 20px;
            color: #333;
        }
        .logo img {
            height: 60px;
            width: auto;
            border-radius: 50%;
            border: 12px;
            float: left;
        }
        .creamyhub {
            margin: 0;
            padding: 0;
        }
           
        header button {
            margin: 10px;
        }
        header a {
            text-decoration: none;
            color: #000;
        }
        .text {
            text-align: center;
            font-family: cursive;
        }
        
    </style>
</head>
<body>
    <div class="logo">
        <img src="download.jfif" alt="Logo">
    </div>
    <div class="welcome-message">
        Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!
    </div>
    <div class="creamyhub"><p style="color: brown;
            text-shadow: 4px 4px 8px bisque;">Creamy Hub</p>
        <script src="script.js"></script>
        <center>
            <header>
                <button><a href="home.php">Home</a></button> |
                <button><a href="cakes.html">Cakes</a></button> |
                <button><a href="cart.php">My Cart</a></button> |
                <button><a href="contact.html">Contact me</a></button> |
                <button><a href="logout.php">Logout</a></button>
            </header>
        </center>

        <div class="text">
            <div style="font-family: cursive; font-variant: normal;">
                <center>
                    <b><u style="font-size: 30px;">Welcome to Creamy Hub!</u></b><br>
                </center>
                <center>
                    At Creamy Hub, we believe that every celebration deserves a touch of sweetness and a sprinkle of joy. Our mission is to make your cake dreams come true with the perfect blend of flavors, designs, and convenience.
                    <br><br>
                    <p>🎂 <u style="font-size: 30px;">Why Choose Creamy Hub?</u></p><br>
                    <p>1. Deliciously Crafted Cakes:</p> From classic favorites to innovative flavors, our cakes are made with high-quality ingredients and crafted by skilled bakers to ensure every bite is a delight.
                    <br>
                    <p>2. Custom Creations:</p> Whether you're celebrating a wedding, birthday, or any special occasion, our extensive customization options allow you to create a cake that's uniquely yours. Choose from a variety of designs, themes, and flavors to match your vision.
                    <br>
                    <p>3. Easy Online Ordering:</p> Our user-friendly platform lets you browse our menu, select your perfect cake, and place your order with just a few clicks. We offer convenient delivery and pickup options to suit your needs.
                    <br>
                    <p>4. Exceptional Service:</p> At Creamy Hub, we’re dedicated to providing outstanding customer service. Our friendly team is here to assist you at every step, ensuring your cake experience is as delightful as the cake itself.
                    <br><br>
                    <p>🍰 <u style="font-size: 30px;">How It Works?</u></p><br>
                    <p>1. Browse & Select:</p> Explore our diverse range of cakes, from classic vanilla to exotic matcha. You can filter by flavor, occasion, and design to find exactly what you're looking for.
                    <br>
                    <p>2. Customize Your Cake:</p> Use our easy-to-navigate customization tools to personalize your cake. Add special messages, choose your preferred size, and select your favorite decorations.
                    <br>
                    <p>3. Place Your Order:</p> Once you're satisfied with your selection, proceed to checkout. Choose between delivery or pickup, and let us handle the rest.
                    <br>
                    <p>4. Enjoy the Sweetness:</p> Sit back and relax while we prepare your cake with care. Whether it's a grand event or a cozy gathering, your cake will arrive fresh and ready to impress.
                    <br><br>
                    <p>🎉 <u style="font-size: 30px;">Start Your Cake Journey Today!</u></p><br>
                    Join the Creamy Hub community and turn every occasion into a memorable celebration. Start browsing our collection now and let us help you find the perfect cake for your special moments.
                    <br>
                    Thank you for choosing Creamy Hub – where every slice is a celebration!
                    <br><br>
                    <p>Contact Us:</p><br>
                    Have questions or need assistance? Feel free to reach out to our support team at creamyhub@gmail.com or call us at 9384731537. We’re here to help!
                    <br><br>
                    <p>Follow Us:</p><br>
                    Stay updated with our latest creations and promotions on our social media pages:
                    <br>
                    Facebook --> Creamy Hub<br>
                    Instagram --> @creamy_hub<br>
                    Twitter --> creamyhub<br>
                </center>
            </div>
        </div>
    </div>
</body>
</html>

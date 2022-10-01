<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Pizza</title>
    <meta name="description" content="Pizza ordering using php">
    <meta name="robots" content="noindex, nofollow">
    <!-- Fav icon -->
    <link rel="icon" type="image/x-icon" href="./img/pizza.ico">
    <!-- Add CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  </head>
  <body>
    <!-- Header -->
    <header>
      <!-- Logo -->
      <div>
        <a href="#">
          <img src="./img/logo.png" alt="Logo">
        </a>
      </div>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php">Biuld Your Own</a></li>
          <li><a href="index.php">About us</a></li>
           <li><a href="index.php">Contact</a></li>
        </ul>
      </nav>
    </header>
    <main>
       <!-- Section 1 -->
      <section class="sec-1">
        <h1>Biuld Your Own Pizza</h1>
      </section>
      <!-- Section 2 - PHP and Form -->
      <section class="form"> 
        <?php 
          if($_SERVER[REQUEST_METHOD] == "POST"){
            $fname    =  trim($_POST['fname']);
            $lname    =  trim($_POST['lname']);
            $email    =  trim($_POST['email']);
            $phone =  trim($_POST['phone']);
            $quantity = ($_POST['quantity']);
            $size   = ($_POST['size']);
            $crust   = ($_POST['crust']);
            $obs   = ($_POST['obs']);
            $dateTime   = ($_POST['dateTime']);
            // checkbox
            $toppingsResult = "";
            $toppingsName = $_POST['top'];
            foreach ($toppingsName as $toppingsValues) {
              $toppingsResult .= $toppingsValues;
            }
            // Creating variable error, and validate the form
            $error = "";
            // checkfname, lname and email
            if (empty($fname)) {
              $error = "First Name is require";
            }else if(empty($lname)){
              $error = "Last Name is required";
            }else if(empty($email)){
              $error = "E-mail is required";
            }else if(empty($phone)){
              $error = "Phone number is required";
            }
            // check if email follow the pattern
            else if (!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)) {
              $error = "Email does not match the correct form";
            }
            // check phone number
            else if(!is_numeric($phone)){
              $error = "Phone number must be number";
            }else if (strlen($phone) != 10) {
              $error = "Phone number must be 10 characters, follow the placeholder format";
            }
            // check number, size, crush and toppings of the pizza
            else if(empty($size)){
              $error = "Size is required";
            }
            else if(empty($crust)){
              $error = "Crush is required";
            }
            else if(empty($toppingsResult)){
              $error = "Please, pick up at least one topping";
            }else{
              ?>
              <script>
                alert('Your request has been sent. Track your order through the App. Thank you!');
              </script>
              <?php
            }
          }
        ?>

        <!-- Starting form -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <!-- Personal information. All information is required -->
          <fieldset>
            <legend>Personal Information</legend>
            <input class="line" type="text" name="fname" placeholder="First Name">
            <input class="line" type="text" name="lname" placeholder="Last Name">
            <input class="line" type="email" name="email" placeholder="Your Email">
            <br><br>
            <label for="phone">Enter your phone number: </label>
              <input type="tel" id="phone" name="phone" placeholder="1112223333"> <!-- phone number format -->
          </fieldset>
          <!-- Biuld pizza -->
          <fieldset>
            <legend>Biuld Your Pizza</legend>
            <label for="quantity">How many pizzas? </label>
            <input type="number" id="quantity" name="quantity" min="1" max="20">
            <br><br>
            <!-- pizza size -->
            <label>Select your size: </label>
            <br>
            <input type="radio" id="small" name="size" value="Small">
              <label for="small">Small</label>
            <input type="radio" id="medium" name="size" value="Medium">
              <label for="medium">Medium</label>
            <input type="radio" id="large" name="size" value="Large">
              <label for="large">Large</label>
            <br><br>
            <!-- pizza crust -->
            <label>Select your crust: </label>
            <br>
            <input type="radio" id="pan" name="crust" value="Pan">
              <label for="pan">Pan</label>
            <input type="radio" id="stuffed" name="crust" value="Stuffed">
              <label for="stuffed">Stuffed</label>
            <input type="radio" id="homestyle" name="crust" value="HomeStyle">
              <label for="homestyle">HomeStyle</label>
            <input type="radio" id="thin" name="crust" value="Thin">
              <label for="thin">Thin</label>
            <br><br>
            <!-- Add toppings -->
            <label>Select your toppings: </label>
            <br>
            <input type="checkbox" id="pepperoni" name="top[]" value="Pepperoni">
              <label for="pepperoni">Peperoni</label>
            <input type="checkbox" id="bacon" name="top[]" value="Bacon">
              <label for="bacon">Bacon</label>
            <input type="checkbox" id="baconstrips" name="top[]" value="BaconStrips">
              <label for="baconstrips">Bacon Strips</label>
            <input type="checkbox" id="ham" name="top[]" value="Ham">
              <label for="ham">Ham</label>
            <input type="checkbox" id="GrilledChicken" name="top[]" value="GrilledChicken">
              <label for="GrilledChicken">Grilled Chicken</label>
            <br>
            <input type="checkbox" id="ItalianSausage" name="top[]" value="ItalianSausage">
              <label for="ItalianSausage">Italian Sausage</label>
            <input type="checkbox" id="beef" name="top[]" value="Beef">
              <label for="beef">Beef</label>
            <input type="checkbox" id="SmokedCheddar" name="top[]" value="SmokedCheddar">
              <label for="SmokedCheddar">Smoked Cheddar</label>
            <br>
            <input type="checkbox" id="mushroom" name="top[]" value="Mushroom">
              <label for="mushroom">Mushroom</label>
            <input type="checkbox" id="jalapenos" name="top[]" value="Jalapenos">
              <label for="jalapenos">Jalapenos</label>
            <input type="checkbox" id="GreenPepper" name="top[]" value="GreenPepper">
              <label for="GreenPepper">Green Pepper</label>
            <input type="checkbox" id="RedOnion" name="top[]" value="RedOnion">
              <label for="RedOnion">Red Onion</label>
            <br>
            <input type="checkbox" id="tomato" name="top[]" value="Tomato">
              <label for="tomato">Tomato</label>
            <input type="checkbox" id="BlackOlive" name="top[]" value="BlackOlive">
              <label for="BlackOlive">Black Olive</label>
            <input type="checkbox" id="GreenOlive" name="top[]" value="GreenOlive">
              <label for="GreenOlive">Green Olive</label>
          </fieldset>
          <!-- Additional Information -->
          <fieldset>
            <legend>Additional Information</legend>
            <!-- text area for add any information about the order -->
            <label for="obs">Any observations?</label>
            <br>
              <textarea id="obs" name="obs"></textarea>
            <br><br>
            <!-- data with time to take off the order -->
            <label for="date-time">Order for: </label>
              <input id="date-time" type="datetime-local" name="dateTime" value="">
          </fieldset>
          <br>
          <input class="btn" type="submit" value="Checkout">
          <input class="btn" type="reset" value="Reset">
          <p><?php echo "$error"; ?></p>
        </form>  <!--End form-->
      </section>
      <!-- Sectio 3 - Result -->
      <section class="result">
        <h2>PIZZA ORDER</h2>
        <p>NAME: <?php echo "$fname $lname"; ?></p>
        <p>E-MAIL: <?php echo "$email"; ?></p>
        <p>PHONE NUMBER: <?php echo "$phone"; ?></p>
        <p>PIZZA QUANTITY: <?php echo "$quantity"; ?></p>
        <p>SIZE: <?php echo "$size"; ?></p>
        <p>CRUST: <?php echo "$crust"; ?></p>
        <p>TOPPINGS: <?php echo "$toppingsResult"; ?></p>
        <p>OBS: <?php echo "$obs"; ?></p>
        <p>DATE AND TIME: <?php echo "$dateTime"; ?></p>
      </section>
    </main>
    <!-- Footer -->
    <footer>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php">About</a></li>
          <li><a href="index.php">Contact</a></li>
        </ul>
      </nav>
      <a href="#">
        <img src="./img/logo.png" alt="Logo">
      </a>
      <div>
        <a href="#"><img src="./img/icon-facebook.png" alt="Facebook"></a>
        <a href="#"><img src="./img/icon-instagram.png" alt="Instagram"></a>
        <a href="#"><img src="./img/icon-twitter.png" alt="Twitter"></a>
        <a href="#"><img src="./img/icon-youtube.png" alt="Youtube"></a>
        </div>
    </footer>
  </body>
</html>

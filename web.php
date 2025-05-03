<?php
session_start();
include("connection.php");

$error = ''; // Declare the $error variable

if (isset($_POST['login-btn'])) {
    $email = filter_input(INPUT_POST, 'useremail', FILTER_SANITIZE_EMAIL);
    $password = $_POST['userpassword'];
    $error = '';

    if ($email === false) {
        $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid email format</label>';
    } else {
        $stmt = $database->prepare("SELECT * FROM webuser WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $utype = $user['usertype'];
            $verified = $user['verified'];

            if ($utype == 'Yana') {
                $storedpass = $user['password'];

                if ($verified == '1') {
                    if (password_verify($password, $storedpass)) {
                        $_SESSION['user'] = $email;
                        $_SESSION['usertype'] = 'Yana';
                        header('location: indexAdmin.php');
                        exit;
                    }
                }

                if ($verified != '1') {
                    header('location: verification.php');
                    exit;
                } else {
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid email or password</label>';
                }
            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid email or password</label>';
            }
        } else {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid email or password</label>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yana Shop</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/styletapHome.css">

</head>
<body>
    
<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo"><span>YA</span>NA</a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#packages">services</a>
        <a href="#gallery">gallery</a>
        <a href="#book">contact</a>
    </nav>

    <div class="icons">
  <i class="fas fa-bell" id="search-btn">
    <?php
       require_once 'config/connect.php';
      $query = "SELECT id FROM `contacts` WHERE usertype='Yana' ORDER BY id";
      $query_run = mysqli_query($database, $query);

      $row = mysqli_num_rows($query_run);
      echo '<span class="count" style="position: relative;">
              <span style="position: absolute; top: -8px; right: -8px; background-color: red; color: white; border-radius: 50%; padding: 4px 8px; font-size: 12px;">'.$row.'</span>
            </span>';
    ?>
  </i>
  
<a href="admin/login.php">
    <i class="fas fa-user" id="login-btn"></i>
 </a>
</div>
    <form action="" class="search-bar-container">
        
        <label for="search-bar" ></label>
    </form>

</header>

<!-- header section ends -->



<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3  style="color: red;">Yana Shop</h3>
        <p style="color: black;">We provide luxury clothes</p>
        <a href="category.php" style="color: black;"class="btn">Check cloths</a>
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src="images/home.jpg"></span>
        <span class="vid-btn" data-src="images/vid-3.mp4"></span>
        
        
    </div>

    <div class="imgg">
        <img src="images/home.jpg" alt="" > 
    </div>

</section>

<!-- home section ends -->



<!-- packages section starts  -->

<section class="packages" id="packages">

    <h1 class="heading">
        <span>C</span>
        <span>l</span>
        <span>o</span>
        <span>t</span>
        <span>h</span>
        <span>s</span>
    </h1>

    <div class="box-container" id="gallery">
        <div class="box">
            <img src="images/Y1.png" alt="">
            <div class="content">
            </div>
        </div> 

        <div class="box">
            <img src="images/Y5.jpg" alt="">
            <div class="content">
                <h3>T-shirts</h3>
                <p></p>
            </div>
        </div> 

        <div class="box">
            <img src="images/Y6.webp" alt="">
            <div class="content">
                <h3>Trousers</h3>
                <p></p>
            </div>
        </div> 

        
        <div class="box">
            <img src="images/Y7.jpg" alt="">
            <div class="content">
                <h3>2 pieces</h3>
                <p></p>
            </div>
        </div> 

    </div>

</section>




<!-- book section ends -->

<!-- brand section  -->
<section class="brand-container">

    <div class="swiper-container brand-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/h.png" alt=""></div>
            <div class="swiper-slide"><img src="images/2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/3.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/4.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/h.png" alt=""></div>
            <div class="swiper-slide"><img src="images/6.jpg" alt=""></div>
        </div>
    </div>

</section>
<!-- book section starts  -->

<section class="book" id="book">

    <h1 class="heading">
        
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="row">

        <div class="image">
            <img src="images/p.png" alt="">
        </div>


        <form action="ContactForm_backend.php" method="POST" >
            <div class="inputBox">
                <h3>Full name</h3>
                <input type="text" name='name' placeholder="name" required>
            </div>
            <div class="inputBox">
                <h3>phone number</h3>
                <input type="text" name='tel' placeholder="number" required>
                <select name="countryCode">
                  <option value="+251" name="tel">South Africa (+27)</option>
                  <option value="+251" name="tel">Ethiopia (+251)</option>
                  <option value="+1">USA (+1)</option>
                  <option value="+44">UK (+44)</option>
                  <option value="+91">India (+91)</option>
                  <!-- Add more options for other countries as needed -->
                </select>
            </div>
            <div class="inputBox">
                <h3>Email</h3>
                <input type="text" name='email' placeholder="email">
            </div>
            <input href="category.php" style="color: black;" type="submit" name='formbtn' class="btn" value="Share">
        </form>

    </div>

</section>



<!-- book section ends -->

<!-- footer section  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p>We provide a quality clothes and dresses</p>
        </div>
        <div class="box">
            <h3>branch location</h3>
            <a href="#">-</a>
           
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#home">home</a>
            <a href="#packages">services</a>
            <a href="#gallery">gallery</a>
            <a href="#book">contact</a>
        </div>
        <div class="box">
            <h3>Contact us</h3>
            <a href="">Instagram</a>
            <a href="#">Facebook</a>
            <a href="">Telegram</a>
        </div>

    </div>

    <h1 class="credit"> Designed by <span>Zebo card </span> | all rights reserved! </h1>
    <h2 class="credits"> contact: <span></span></h2>

</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/scriptHome.js"></script>

</body>
</html>
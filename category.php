<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Page</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #f4f4f9;
}
html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
  }

#wrapper {
    min-height: 100vh;
    width: 100%;
}

h1 {
    margin: 20px 0;
}

.category-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.category {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    transition: transform 0.3s;
    width: 300px;
}

.category img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 10px;
}

.category:hover {
    transform: scale(1.05);
}

.category-title {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    text-align: center;
    padding: 10px;
    font-size: 1.2em;
    border-radius: 0 0 10px 10px;
}

.text {
    position: relative;
    top: 20px;
}


/* Container for the logo */
.logo-container {
    position: absolute;  /* Position relative to the viewport */
    top: -25px;          /* Move the logo 10px above the top of the viewport */
    left: 0;             /* Align to the left */
    padding: 10px;       /* Optional padding around the logo */
}

/* Style for the logo image */
.logo {
    max-width: 150px;    /* Set a maximum width for the logo */
    height: auto;        /* Maintain the aspect ratio */
}

/* Media query for small devices (phones) */
@media (max-width: 600px) {
    .logo {
        max-width: 100px;  /* Smaller logo size for phones */
    }
}


    </style>
</head>
<body>
    <!-- Logo Image -->
    <div class="logo-container">
        <img src="images/Y1.png" alt="Logo" class="logo">
    </div>
    <h1 class="text">Categories</h1>
    <div class="category-container">
        <a href="index.php?id=19" class="category">
            <img src="images/T.jpg" alt="Category 1">
            <div class="category-title">T-shirts</div>
        </a>
        <a href="index.php?id=20" class="category">
            <img src="images/Y7.jpg" alt="Category 2">
            <div class="category-title">2 pieces</div>
        </a>
        <a href="index.php?id=21" class="category">
            <img src="images/C.jpg" alt="Category 2">
            <div class="category-title">Capes</div>
        </a>
        <a href="index.php?id=22" class="category">
            <img src="images/S.jpg" alt="Category 2">
            <div class="category-title">Shoes</div>
        </a>
        <a href="index.php?id=23" class="category">
            <img src="images/Sc.jpg" alt="Category 2">
            <div class="category-title">Socks</div>
        </a>
        <a href="index.php?id=24" class="category">
            <img src="images/Y6.webp" alt="Category 2">
            <div class="category-title">Trousers</div>
        </a>
        <a href="index.php?id=25" class="category">
            <img src="images/J.jpg" alt="Category 2">
            <div class="category-title">Jackets</div>
        </a>
        <a href="index.php?id=26" class="category">
            <img src="images/Je.jpg" alt="Category 2">
            <div class="category-title">Jersey</div>
        </a>
        <a href="index.php?id=28" class="category">
            <img src="images/Sw.jpg" alt="Category 2">
            <div class="category-title">SweatShirts</div>
        </a>
      
        <a href="index.php?id=23" class="category">
            <img src="images/hh.jpg" alt="Category 2">
            <div class="category-title">Hoodies</div>
        </a>
       
        <!-- Add more categories as needed -->
    </div>
</body>
</html>

<?php include 'inc/footer.php' ?>
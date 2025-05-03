<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<style>
/* Logo Container */
.logo-container {
    position: absolute;
    top: -25px;
    left: 10px;
    padding: 10px;
}

.logo {
    max-width: 150px;
    height: auto;
}

@media (max-width: 600px) {
    .logo {
        max-width: 100px;
    }
}

/* Product Grid Styling */
#shop-mason {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.sm-item {
    flex: 1 1 calc(25% - 20px);
    box-sizing: border-box;
    background: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}

.sm-item:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}

.product {
    text-align: center;
    padding: 15px;
}

.product-thumb {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.product-thumb img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}

.product-thumb:hover img {
    transform: scale(1.1);
}

.product-overlays {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.6);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-thumb:hover .product-overlays {
    opacity: 1;
}

.product-overlays span a {
    margin: 5px;
    padding: 10px 15px;
    background: #007bff;
    color: #fff;
    border-radius: 5px;
    font-size: 14px;
    text-transform: uppercase;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.product-overlays span a:hover {
    background: #0056b3;
}

/* Rating Stars */
.rating {
    margin-top: 10px;
}

.rating .fa-star {
    color: #ffc107;
}

/* Product Title and Price */
.product-title a {
    display: block;
    margin: 10px 0;
    font-size: 18px;
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.product-title a:hover {
    color: #007bff;
}

.product-price {
    font-size: 16px;
    color: #666;
    font-weight: bold;
}

@media (max-width: 992px) {
    .sm-item {
        flex: 1 1 calc(33.333% - 20px);
    }
}

@media (max-width: 768px) {
    .sm-item {
        flex: 1 1 calc(50% - 20px);
    }
}

@media (max-width: 576px) {
    .sm-item {
        flex: 1 1 calc(100% - 20px);
    }
}
</style>

<!-- Logo Image -->
<div class="logo-container">
    <img src="images/Y1.png" alt="Logo" class="logo">
</div>

<!-- Shop Content -->
<section id="content">
    <div class="content-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div id="shop-mason" class="shop-mason-4col">
                            <?php 
                            $sql = "SELECT * FROM products WHERE usertype='Yana'";

                            if (isset($_GET['id']) && !empty($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql .= " AND catid=$id";
                            }  
                            $res = mysqli_query($connection, $sql);
                            while ($r = mysqli_fetch_assoc($res)) {
                                // Get the first image from the comma-separated thumb field
                                $images = explode(',', $r['thumb']);
                                $firstImage = $images[0];
                            ?>
                            <div class="sm-item isotope-item">
                                <div class="product">
                                    <div class="product-thumb">
                                        <img src="admin/<?php echo $firstImage; ?>" class="img-responsive" alt="Product Image">
                                        <div class="product-overlays">
                                            <span>
                                                <a class="btn btn-primary displaybtn" href="single.php?id=<?php echo $r['id']; ?>">
                                                    <i class="fa fa-shopping-cart"></i> Details
                                                </a>
                                                <a class="btn btn-primary displaybtn" href="single.php?id=<?php echo $r['id']; ?>">
                                                    <i class="fa fa-link"></i> View
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <span class="fa fa-star act"></span>
                                        <span class="fa fa-star act"></span>
                                        <span class="fa fa-star act"></span>
                                        <span class="fa fa-star act"></span>
                                        <span class="fa fa-star act"></span>
                                    </div>
                                    <h2 class="product-title">
                                        <a href="single.php?id=<?php echo $r['id']; ?>"><?php echo $r['name']; ?></a>
                                    </h2>
                                    <div class="product-price">Rand <?php echo $r['price']; ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>

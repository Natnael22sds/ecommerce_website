<?php
ob_start();
session_start();
require_once 'config/connect.php'; 

// Fetch product details
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connection, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $prodr = mysqli_fetch_assoc($result);
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid product ID.";
    exit;
}

// Extract product images
$images = explode(',', $prodr['thumb']);
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<!-- Product Gallery Section -->
<section id="content">
    <div class="content-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- Product Gallery -->
                            <div class="product-gallery">
                                <!-- Main Image -->
                                <div class="main-image">
                                    <img id="selected-image" src="admin/<?php echo $images[0]; ?>" alt="Product Image" class="img-responsive">
                                </div>

                                <!-- Thumbnails -->
                                <div class="thumbnail-gallery">
                                    <?php foreach ($images as $image) { ?>
                                        <img src="admin/<?php echo $image; ?>" class="thumbnail" alt="Product Thumbnail">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7 product-single">
                            <h2 class="product-single-title no-margin"><?php echo $prodr['name']; ?></h2>
                            <div class="space10"></div>
                            <div class="p-price">Rand <?php echo $prodr['price']; ?></div>
                            <p><?php echo $prodr['description']; ?></p>
                            <form method="get" action="addtocart.php">
                                <div class="product-quantity">
                                    <span>Quantity:</span>
                                    <input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
                                    <input type="text" name="quant" placeholder="1">
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="shop-btn-wrap">
                                            <a href="tel:+27845908516" class="button btn-small">Call now</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="clearfix space30"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?php include 'inc/footer.php'; ?>

<!-- Modern Gallery Styling -->
<style>
.product-gallery {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.main-image img {
    max-width: 100%;
    max-height: 400px;
    object-fit: contain;
    border: 2px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.thumbnail-gallery {
    display: flex;
    gap: 10px;
    justify-content: center;
    flex-wrap: wrap;
}

.thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 2px solid transparent;
    border-radius: 5px;
    cursor: pointer;
    transition: border-color 0.3s ease;
}

.thumbnail:hover,
.thumbnail.active {
    border-color: #007bff;
}
</style>

<!-- Modern Gallery Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const thumbnails = document.querySelectorAll('.thumbnail');
    const selectedImage = document.getElementById('selected-image');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Update the main image
            selectedImage.src = this.src;

            // Highlight the selected thumbnail
            thumbnails.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Set the first thumbnail as active initially
    if (thumbnails.length > 0) {
        thumbnails[0].classList.add('active');
    }
});
</script>

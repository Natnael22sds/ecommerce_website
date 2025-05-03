<?php
session_start();
require_once '../config/connect.php';
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: login.php');
}

if (isset($_POST) && !empty($_POST)) {
    $prodname = mysqli_real_escape_string($connection, $_POST['productname']);
    $description = mysqli_real_escape_string($connection, $_POST['productdescription']);
    $category = mysqli_real_escape_string($connection, $_POST['productcategory']);
    $price = mysqli_real_escape_string($connection, $_POST['productprice']);
    $imagePaths = []; // Array to hold paths of uploaded images

    if (isset($_FILES['productimage']) && !empty($_FILES['productimage']['name'][0])) {
        $max_size = 10000000; // 10MB
        foreach ($_FILES['productimage']['name'] as $key => $name) {
            $size = $_FILES['productimage']['size'][$key];
            $tmp_name = $_FILES['productimage']['tmp_name'][$key];
            $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            
            // Optional: Check if the file is a valid image
            if (getimagesize($tmp_name) && $size <= $max_size) {
                $location = "uploads/";
                $finalPath = $location . time() . "_" . $name; // Prevent filename conflicts
                if (move_uploaded_file($tmp_name, $finalPath)) {
                    $imagePaths[] = $finalPath; // Add the valid image path
                } else {
                    $fmsg = "Failed to upload file $name";
                }
            } else {
                $fmsg = "Each file should be a valid image and less than 10MB.";
            }
        }
    }

    // Concatenate all image paths into a comma-separated string
    $images = implode(",", $imagePaths);
    $sql = "INSERT INTO products (name, description, catid, price, thumb, usertype) VALUES ('$prodname', '$description', '$category', '$price', '$images', 'Yana')";
    $res = mysqli_query($connection, $sql);

    if ($res) {
        header('location: products.php');
    } else {
        $fmsg = "Failed to Create Product";
    }
}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<section id="content">
    <div class="content-blog">
        <div class="container">
            <?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
            <?php if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Productname">Product Name</label>
                    <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label for="productdescription">Product Description</label>
                    <textarea class="form-control" name="productdescription" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="productcategory">Product Category</label>
                    <select class="form-control" id="productcategory" name="productcategory">
                        <option value="">---SELECT CATEGORY---</option>
                        <?php
                        $sql = "SELECT * FROM category WHERE usertype='Yana'";
                        $res = mysqli_query($connection, $sql);
                        while ($r = mysqli_fetch_assoc($res)) {
                        ?>
                            <option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="productprice">Product Price</label>
                    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
                </div>
                <div class="form-group">
                    <label for="productimage">Product Images</label>
                    <input type="file" name="productimage[]" id="productimage" multiple>
                    <p class="help-block">All image types are allowed, each less than 10MB.</p>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</section>
<?php include 'inc/footer.php' ?>

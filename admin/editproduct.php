<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['id'];
	}else{
		header('location: products.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$prodname = mysqli_real_escape_string($connection, $_POST['productname']);
		$description = mysqli_real_escape_string($connection, $_POST['productdescription']);
		$category = mysqli_real_escape_string($connection, $_POST['productcategory']);
		$price = mysqli_real_escape_string($connection, $_POST['productprice']);

		$imagePaths = []; // Array to hold paths of uploaded images
		$existingImages = $_POST['existing_images']; // Get existing images from hidden input

		if(isset($_FILES['productimage']) && !empty($_FILES['productimage']['name'][0])){
			$max_size = 10000000;
			$allowed_extensions = ["jpg", "jpeg", "png"];

			foreach($_FILES['productimage']['name'] as $key => $name){
				$size = $_FILES['productimage']['size'][$key];
				$type = $_FILES['productimage']['type'][$key];
				$tmp_name = $_FILES['productimage']['tmp_name'][$key];
				$extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

				if(in_array($extension, $allowed_extensions) && ($type == "image/jpeg" || $type == "image/png") && $size <= $max_size){
					$location = "uploads/";
					$finalPath = $location . time() . "_" . $name; // To prevent filename conflicts
					if(move_uploaded_file($tmp_name, $finalPath)){
						$imagePaths[] = $finalPath;
					}else{
						$fmsg = "Failed to upload file $name";
					}
				}else{
					$fmsg = "Only JPG and PNG files are allowed, and each file should be less than 10MB.";
				}
			}
		}

		// Combine new and existing images
		$allImages = array_merge(explode(',', $existingImages), $imagePaths);
		$images = implode(",", $allImages); // Concatenate images as comma-separated string

		$sql = "UPDATE products SET name='$prodname', description='$description', catid='$category', price='$price', thumb='$images' WHERE id = $id";
		$res = mysqli_query($connection, $sql);
		if($res){
			$smsg = "Product Updated";
		}else{
			$fmsg = "Failed to Update Product";
		}
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<?php 
				$sql = "SELECT * FROM products WHERE id=$id";
				$res = mysqli_query($connection, $sql); 
				$r = mysqli_fetch_assoc($res);
				$existingImages = $r['thumb']; // Get existing images from the database
			?>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="existing_images" value="<?php echo $existingImages; ?>">
			  <div class="form-group">
			    <label for="Productname">Product Name</label>
			    <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name" value="<?php echo $r['name']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="productdescription">Product Description</label>
			    <textarea class="form-control" name="productdescription" rows="3"><?php echo $r['description']; ?></textarea>
			  </div>

			  <div class="form-group">
			    <label for="productcategory">Product Category</label>
			    <select class="form-control" id="productcategory" name="productcategory">
			    <?php 	
					$catsql = "SELECT * FROM category WHERE usertype='Yana'";
					$catres = mysqli_query($connection, $catsql); 
					while ($catr = mysqli_fetch_assoc($catres)) {
				?>
					<option value="<?php echo $catr['id']; ?>" <?php if( $catr['id'] == $r['catid']){ echo "selected"; } ?>><?php echo $catr['name']; ?></option>
				<?php } ?>
				</select>
			  </div>

			  <div class="form-group">
			    <label for="productprice">Product Price</label>
			    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price" value="<?php echo $r['price']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="productimage">Product Images</label>
			    <?php 
			    if(!empty($existingImages)){
			    	$imageArray = explode(',', $existingImages); // Split the comma-separated image paths
			    	foreach($imageArray as $image){
				?>
			    	<br>
			    	<img src="<?php echo $image ?>" width="100px" height="100px">
			    	<a href="delprodimg.php?id=<?php echo $r['id']; ?>&img=<?php echo urlencode($image); ?>">Delete Image</a>
			    <?php 
			    	}
			    } 
			    ?>
			    <br>
			    <input type="file" name="productimage[]" id="productimage" multiple>
			    <p class="help-block">Only jpg/png files are allowed, each less than 10MB.</p>
			  </div>
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</section>

<?php include 'inc/footer.php' ?>

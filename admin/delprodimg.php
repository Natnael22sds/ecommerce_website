<?php
	session_start();
	require_once '../config/connect.php';

	// Check if the user is logged in
	if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
		header('location: login.php');
		exit;
	}

	// Get the product ID and the image path from the URL
	if(isset($_GET['id']) && isset($_GET['img']) && !empty($_GET['id']) && !empty($_GET['img'])){
		$id = $_GET['id'];
		$imagePath = urldecode($_GET['img']);  // Decode the URL-encoded image path

		// Fetch the product's existing images from the database
		$sql = "SELECT thumb FROM products WHERE id = $id";
		$res = mysqli_query($connection, $sql);

		if(mysqli_num_rows($res) > 0){
			$product = mysqli_fetch_assoc($res);
			$existingImages = $product['thumb'];

			// Split the thumb field into an array of image paths
			$imageArray = explode(',', $existingImages);

			// Remove the image to be deleted from the array
			if(($key = array_search($imagePath, $imageArray)) !== false) {
			    unset($imageArray[$key]); // Remove the image from the array
			}

			// Rebuild the thumb field (comma-separated list) after removing the image
			$updatedImages = implode(',', $imageArray);

			// Delete the image file from the server
			if(file_exists($imagePath)){
				unlink($imagePath);  // Remove the image file from the server
			}

			// Update the product record in the database with the new list of images
			$updateSql = "UPDATE products SET thumb = '$updatedImages' WHERE id = $id";
			if(mysqli_query($connection, $updateSql)){
				// Redirect back to the product edit page
				header("Location: editproduct.php?id=$id");
				exit;
			}else{
				echo "Failed to update product images in the database.";
			}
		}else{
			echo "Product not found.";
		}
	}else{
		echo "Invalid request.";
	}
?>

<?php
session_start();
require_once '../config/connect.php';
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('location: login.php');
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT thumb FROM products WHERE id=$id";
    $res = mysqli_query($connection, $sql);
    $r = mysqli_fetch_assoc($res);

    if(!empty($r['thumb'])){
        // Split the images in the thumb field by comma
        $images = explode(',', $r['thumb']);

        // Iterate through each image and delete it from the server
        foreach($images as $image) {
            $imagePath = "../" . trim($image); // Adjust the path as needed
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }
    }

    // Delete the product from the database
    $delsql = "DELETE FROM products WHERE id=$id";
    if(mysqli_query($connection, $delsql)){
        header("location: products.php");
    } else {
        echo "Error: Could not delete product.";
    }
} else {
    header('location: products.php');
}
?>

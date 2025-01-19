<?php
include 'db_connect.php';

$product_id = $_POST['id'];
$product_name = $_POST['name'];
$product_description = $_POST['description'];
$product_price = $_POST['price'];
$product_category = $_POST['category'];

$sql = "UPDATE products SET name='$product_name', description='$product_description', price='$product_price', category='$product_category' WHERE id=$product_id";

if ($conn->query($sql) === TRUE) {
    echo "Product updated successfully.";
} else {
    echo "Error updating product: " . $conn->error;
}

$conn->close();

// Redirect back to the products page
header("Location: products.php");
exit();
?>
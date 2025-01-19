<?php
include 'db_connect.php';

$product_id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$product_id";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully.";
} else {
    echo "Error deleting product: " . $conn->error;
}

$conn->close();

// Redirect back to the products page
header("Location: products.php");
exit();
?>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php#login");
    exit();
}

include 'db_connect.php';

$product_id = $_POST['product_id'];
$user_id = $_SESSION['user_id'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

$sql = "INSERT INTO reviews (product_id, user_id, rating, comment) VALUES ('$product_id', '$user_id', '$rating', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Review added successfully.";
} else {
    echo "Error adding review: " . $conn->error;
}

$conn->close();

// Redirect back to the products page
header("Location: products.php");
exit();
?>
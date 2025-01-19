<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - AVIS IT Solutions Uganda</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <header>
        <h1>Edit Product</h1>
    </header>
    <div class="container">
        <?php
            include 'db_connect.php';

            $product_id = $_GET['id'];
            $sql = "SELECT id, name, description, price, category FROM products WHERE id = $product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $product = $result->fetch_assoc();
            } else {
                echo "Product not found.";
                exit();
            }

            $conn->close();
        ?>
        <form action="update_product.php" method="post">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <label for="name">Product Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required><br><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea><br><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" required><br><br>
            <label for="category">Category:</label><br>
            <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>" required><br><br>
            <input type="submit" value="Update Product">
        </form>
    </div>
</body>
</html>
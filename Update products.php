<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - AVIS IT Solutions Uganda</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <header>
        <h1>Manage Products</h1>
    </header>
    <div class="container">
        <section id="search">
            <h2>Search Products</h2>
            <form action="products.php" method="get">
                <input type="text" name="search" placeholder="Search for products...">
                <input type="submit" value="Search">
            </form>
        </section>
        <section id="products">
            <h2>Our Products</h2>
            <?php
                include 'db_connect.php';

                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $sql = "SELECT id, name, description, price, category FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<h3>" . $row["name"] . "</h3>";
                        echo "<p>" . $row["description"] . "</p>";
                        echo "<p>Price: " . $row["price"] . " USD</p>";
                        echo "<p>Category: " . $row["category"] . "</p>";
                        echo "<a href='edit_product.php?id=" . $row["id"] . "'>Edit</a> | ";
                        echo "<a href='delete_product.php?id=" . $row["id"] . "'>Delete</a>";
                        echo "<h4>Reviews:</h4>";
                        $review_sql = "SELECT rating, comment FROM reviews WHERE product_id = " . $row["id"];
                        $review_result = $conn->query($review_sql);
                        if ($review_result->num_rows > 0) {
                            while($review = $review_result->fetch_assoc()) {
                                echo "<p>Rating: " . $review["rating"] . "/5</p>";
                                echo "<p>Comment: " . $review["comment"] . "</p>";
                            }
                        } else {
                            echo "<p>No reviews yet.</p>";
                        }
                        echo "<form action='add_review.php' method='post'>";
                        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                        echo "<label for='rating'>Rating:</label><br>";
                        echo "<input type='number' id='rating' name='rating' min='1' max='5' required><br><br>";
                        echo "<label for='comment'>Comment:</label><br>";
                        echo "<textarea id='comment' name='comment' required></textarea><br><br>";
                        echo "<input type='submit' value='Add Review'>";
                        echo "</form>";
                        echo "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>";
                        echo "<input type='hidden' name='cmd' value='_s-xclick'>";
                        echo "<input type='hidden' name='hosted_button_id' value='YOUR_PAYPAL_BUTTON_ID'>";
                        echo "<input type='hidden' name='item_name' value='" . $row["name"] . "'>";
                        echo "<input type='hidden' name='amount' value='" . $row["price"] . "'>";
                        echo "<input type='submit' value='Buy Now'>";
                        echo "</form>";
                        echo "</div>";
                    }
                } else {
                    echo "No products found.";
                }

                $conn->close();
            ?>
        </section>
        <section id="add_product">
            <h2>Add Product</h2>
            <div class="product">
                <form action="insert_product.php" method="post">
                    <label for="name">Product Name:</label><br>
                    <input type="text" id="name" name="name" required><br><br>
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" required></textarea><br><br>
                    <label for="price">Price:</label><br>
                    <input type="text" id="price" name="price" required><br><br>
                    <label for="category">Category:</label><br>
                    <input type="text" id="category" name="category" required><br><br>
                    <input type="submit" value="Add Product">
                </form>
            </div>
        </section>
    </div>
</body>
</html>
``
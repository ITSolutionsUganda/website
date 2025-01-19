<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVIS IT Solutions Uganda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
        }
        nav a {
            color: #fff;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        nav a:hover {
            background-color: #555;
        }
        .container {
            padding: 20px;
        }
        .service, .login, .register, .product {
            background-color: #fff;
            margin: 10px 0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>AVIS IT Solutions Uganda</h1>
        <p>Located in Kampala | Contact: 0742020610</p>
    </header>
    <nav>
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="products.php">Products</a>
        <a href="profile.php">Profile</a>
        <a href="#login">Login</a>
        <a href="#register">Register</a>
        <a href="#contact">Contact</a>
    </nav>
    <div class="container">
        <section id="home">
            <h2>Welcome to AVIS IT Solutions Uganda</h2>
            <p>We offer a range of IT consulting services to help your business succeed.</p>
        </section>
        <section id="services">
            <h2>Our Services</h2>
            <?php
                $services = [
                    "IT Consulting" => "Helping businesses align their IT strategies with their overall business goals.",
                    "Application Development/Support" => "Providing customized software solutions using the latest technologies like Cloud, Data Warehousing, DevOps, Java8, FullStack, and more.",
                    "Networking & Security" => "Ensuring robust and secure IT infrastructure.",
                    "Data Analytics and Big Data" => "Leveraging data to drive business insights and decisions."
                ];

                foreach ($services as $service => $description) {
                    echo "<div class='service'>";
                    echo "<h3>$service</h3>";
                    echo "<p>$description</p>";
                    echo "</div>";
                }
            ?>
        </section>
        <section id="login">
            <h2>Login</h2>
            <div class="login">
                <form action="login_user.php" method="post">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br><br>
                    <input type="submit" value="Login">
                </form>
            </div>
        </section>
        <section id="register">
            <h2>Register</h2>
            <div class="register">
                <form action="register_user.php" method="post">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br><br>
                    <input type="submit" value="Register">
                </form>
            </div>
        </section>
        <section id="contact">
            <h2>Contact Us</h2>
            <p>For more information, please contact us at 0742020610.</p>
        </section>
    </div>
    <footer>
        <p>&copy; 2025 AVIS IT Solutions Uganda. All rights reserved.</p>
    </footer>
</body>
</html>
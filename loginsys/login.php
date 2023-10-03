<?php
// Start a session (if not already started)
session_start();

// Database connection
$db = new mysqli('localhost', 'root', 'php369!', 'mydatabase');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute a query to check if the user exists
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User exists, fetch user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, user is authenticated

            // Store user data in a session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Redirect to a welcome page or dashboard
            header("Location: welcome.php");
            exit();
        } else {
            $login_error = "Incorrect password";
        }
    } else {
        $login_error = "User not found";
    }

    // Close the database connection
    $stmt->close();
}

// Close the database connection
$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <div class="logo">
                <img src="logo.png" alt="Trading Hub Logo">
                <h1>Trading Hub</h1>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="login">
        <div class="login-container">
            <h2>Login to Your Account</h2>
            <form action="login.php" method="POST" class="login-form">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Login">
            </form>
            <p class="logintext">Not registered yet? <a href="signup.php">Sign up</a></p>
            <?php
            if (isset($login_error)) {
                echo "<p class='error'>$login_error</p>";
            }
            ?>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2023 Trading Hub</p>
        
    </footer>
</body>
</html>

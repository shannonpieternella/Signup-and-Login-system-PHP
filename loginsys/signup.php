<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trading Hub</title>
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

    <section class="hero">
        <h2>Welcome to Trading Hub</h2>
        <p>Your gateway to financial success</p>
        <button class="button" onclick="scrollToForm()">Get Started</button>

    </section>

    <section class="features">
        <div class="feature">
            <img src="feature1.png" alt="Feature 1">
            <h3>Real-Time Data</h3>
            <p>Access up-to-the-minute market data.</p>
        </div>
        <div class="feature">
            <img src="feature2.png" alt="Feature 2">
            <h3>Secure Trading</h3>
            <p>Your investments are safe with us.</p>
        </div>
        <div class="feature">
            <img src="feature3.png" alt="Feature 3">
            <h3>Expert Advice</h3>
            <p>Receive insights from experienced traders.</p>
        </div>
    </section>

    <section class="signup">
        <div class="signup-container">
            <h2 class= "signuptext">Sign Up Today</h2>
            <p>Join our community and start trading!</p>
            <form action="register.php" method="POST" class="signup-form" id="signupForm">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Sign Up">
            </form>
            <p class="signuptext">Already signed up? <a href="login.php">Login</a></p>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2023 Trading Hub</p>
    </footer>

    <script>
        function scrollToForm() {
            var formElement = document.getElementById("signupForm");
            formElement.scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>

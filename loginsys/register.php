<?php
// Database connection
$db = new mysqli('localhost', 'root', 'php369!', 'mydatabase');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get user input
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert user data into the database
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Registration successful. <a href='login.php'>Login</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$db->close();
?>

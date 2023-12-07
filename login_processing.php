<?php
// Start the session
session_start();

// Create a connection
$mysqli = new mysqli("localhost", "root", "", "webass");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the email and password from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare a SQL query to find the user with the entered email
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists and if the password is correct
if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        // Assign values to session variables
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        // Set a cookie for auto-login
        setcookie('auto_login', $row['id'], time() + 300);

        // Redirect to the dashboard
        header("Location: homepage.php");
    } else {
        echo "Incorrect username or password!";
    }
} else {
    echo "Incorrect username or password!";
}

// Close the connection
$mysqli->close();

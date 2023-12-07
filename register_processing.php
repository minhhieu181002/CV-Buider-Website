<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill in all fields.";
        exit;
    }

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $mysqli = new mysqli("localhost", "root", "", "webass");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $check_email_stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_result = $check_email_stmt->get_result();

    if ($check_email_result->num_rows > 0) {
        echo "Email is already registered. Please use a different email.";
        $check_email_stmt->close();
        $mysqli->close();
        exit;
    }

    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hash_password);

    if ($stmt->execute()) {
        header("Location: index.php?page=login");
        exit;
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $mysqli->close();
}

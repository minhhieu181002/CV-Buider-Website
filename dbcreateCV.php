<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to the login page or perform any necessary action
    header("Location: login.php");
    exit();
}

// Database connection
$mysqli = new mysqli("localhost", "root", "", "webass");

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Collect data from the form
$userId = $_SESSION['id']; // Get the userId from the session
$name = $_POST["name"];
$fullName = $_POST["full_name"];
$dateOfBirth = $_POST["date_of_birth"];
$address = $_POST["address"];
$introduction = $_POST["introduction"];
$phoneNumber = $_POST["phone_number"];
$certificate = $_POST["certificate"];
$mail = $_POST["mail"];
$experience = $_POST["experience"];
$education = $_POST["education"];
$skill = $_POST["skill"];

// Prepare the SQL statement
$sql = "INSERT INTO resumes (userId, name, full_name, date_of_birth, address, introduction, phone_number, certificate, mail, experience, education, skill)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare and bind the SQL statement
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("isssssssssss", $userId, $name, $fullName, $dateOfBirth, $address, $introduction, $phoneNumber, $certificate, $mail, $experience, $education, $skill);

// Execute the statement
if ($stmt->execute()) {
    echo "Resume added successfully!";
    header("Location: index.php?page=homepage");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();

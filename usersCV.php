<?php
include'header.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    echo '<p>Please log in to create CV.</p>';
    exit();
}

// Create a database connection
$mysqli = new mysqli("localhost", "root", "", "webass");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the logged-in user's ID
$userId = $_SESSION['id'];

// Query to retrieve resumes for the logged-in user
$sql = "SELECT mail, name, full_name FROM resumes WHERE userId = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any resumes
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display each resume in a card
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card border" style="border: 1px solid #ccc;">'; // Add border and scaling
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Name: ' . $row['name'] . '</h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted">Full Name: ' . $row['full_name'] . '</h6>';
        echo '<p class="card-text">Email: ' . $row['mail'] . '</p>';
        echo '<a href="printCV1.php" class="btn btn-primary">Choose Template 1</a>'; // Add the "Choose Template" button
        echo '<a href="printCV2.php" class="btn btn-primary">Choose Template 2</a>'; // Add the "Choose Template" button

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No resumes found for this user.</p>';
}

// Close the database connection
$mysqli->close();

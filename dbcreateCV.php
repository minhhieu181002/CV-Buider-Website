<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}

// Database connection
$mysqli = new mysqli("localhost", "root", "", "webass");

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4");

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
$skill = $_POST["skill"];

// File upload logic
$avatarUrl = '';
if (isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];
    $fileName = $_FILES['avatar']['name'];
    $fileTmpName = $_FILES['avatar']['tmp_name'];
    $fileSize = $_FILES['avatar']['size'];
    $fileError = $_FILES['avatar']['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    $uploadDirectory = 'avatar/';

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = $uploadDirectory . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $avatarUrl = $fileDestination;
            } else {
                echo "Your file is too big!";
                exit();
            }
        } else {
            echo "There was an error uploading your file!";
            exit();
        }
    } else {
        echo "You cannot upload files of this type!";
        exit();
    }
}

// Insert resume information
$sql = "INSERT INTO resumes (userId, name, full_name, date_of_birth, address, introduction, phone_number, certificate, mail, skill, avatar_url)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (false === $stmt) {
    die("Prepare failed: " . htmlspecialchars($mysqli->error));
}

$stmt->bind_param("issssssssss", $userId, $name, $fullName, $dateOfBirth, $address, $introduction, $phoneNumber, $certificate, $mail, $skill, $avatarUrl);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
    $stmt->close();
    $mysqli->close();
    exit();
}

$resumeId = $stmt->insert_id;
$stmt->close();

// Function to insert multiple entries into a table
function insertMultipleEntries($mysqli, $tableName, $resumeId, $titles, $descriptions)
{
    $sql = "INSERT INTO $tableName (resume_id, title, description) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    for ($i = 0; $i < count($titles); $i++) {
        $stmt->bind_param("iss", $resumeId, $titles[$i], $descriptions[$i]);
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

// Insert education entries
if (isset($_POST['education_title']) && isset($_POST['education_description'])) {
    insertMultipleEntries($mysqli, "education", $resumeId, $_POST['education_title'], $_POST['education_description']);
}

// Insert experience entries
if (isset($_POST['experience_title']) && isset($_POST['experience_description'])) {
    insertMultipleEntries($mysqli, "experience", $resumeId, $_POST['experience_title'], $_POST['experience_description']);
}

// Redirect to homepage
header("Location: index.php?page=homepage");

// Close the database connection
$mysqli->close();

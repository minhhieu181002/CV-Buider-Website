<?php
// Create a connection
session_start();
$mysqli = new mysqli("localhost", "root", "", "webass");

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Get the logged-in user's ID
$userId = $_SESSION['id'];


//Get data from resume table
$sql = "SELECT id,name,full_name,date_of_birth,address,introduction,phone_number,certificate,mail,skill,avatar_url FROM resumes WHERE userId = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $resume_id = $row['id'];
    $nameOfCV = $row['name'];
    $fullName = $row['full_name'];
    $dateOfBirth = $row['date_of_birth'];
    $intro = $row['introduction'];
    $address = $row['address'];
    $phone = $row['phone_number'];
    $certificate = $row['certificate'];
    $mail = $row['mail'];
    $skill = $row['skill'];
    $avt = $row['avatar_url'];
  }
}
echo $avt;
echo $fullName;
//Get data form education table
$sql = "SELECT title,description FROM education WHERE resume_id = $resume_id";
$stmt = $mysqli->prepare($sql);
//$stmt->bind_param('i', $resume_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
  $data = array();
  $i = 0;
  while($row = $result->fetch_assoc()) {
   print_r($row);
}

}



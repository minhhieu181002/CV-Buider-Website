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

// Get data from resume table
$sql = "SELECT id, name, full_name, date_of_birth, address, introduction, phone_number, certificate, mail, skill, avatar_url FROM resumes WHERE userId = ?";
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

// Get data from education table
$sql = "SELECT title, description FROM education WHERE resume_id = $resume_id";
$result = $mysqli->query($sql);
$educationData = array(); // Create an array to store education data
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $educationData[] = $row; // Populate the educationData array
  }
}

// Get data from experience table
$sql = "SELECT title, description FROM experience WHERE resume_id = $resume_id";
$result = $mysqli->query($sql);
$experienceData = array(); // Create an array to store experience data
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $experienceData[] = $row; // Populate the experienceData array
  }
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <title>Document</title>
  <link rel='stylesheet' type='text/css' href='/tem4/tem4.css' />
  <style>
    @media print {
      #printBtn {
        display: none;
      }
    }
  </style>
</head>

<body>
  <script src='https://kit.fontawesome.com/b99e675b6e.js'></script>
  <script>
    function printDocument() {
      window.print();
      return false;
    }
  </script>

  <div class='resume'>
    <div class='resume_left'>
      <div class='resume_profile'>
        <img src='<?= $avt ?>' alt='profile_pic' />
      </div>
      <div class='resume_content'>
        <div class='resume_item resume_info'>
          <div class='title'>
            <p class='bold'><?= $fullName ?></p>
            <p class='regular'><?= $nameOfCV ?></p>
          </div>
          <ul>
            <li>
              <div class='icon'>
                <i class='fas fa-map-signs'></i>
              </div>
              <div class='data'>
                <?= $address ?>
              </div>
            </li>
            <li>
              <div class='icon'>
                <i class='fas fa-mobile-alt'></i>
              </div>
              <div class='data'><?= $phone ?></div>
            </li>
            <li>
              <div class='icon'>
                <i class='fas fa-envelope'></i>
              </div>
              <div class='data'><?= $mail ?></div>
            </li>
          </ul>
        </div>
        <div class='resume_item resume_skills'>
          <div class='title'>
            <p class='bold'>Skills</p>
          </div>
          <ul>
            <li>
              <div class='skill_name'><?= $skill ?></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class='resume_right'>
      <div class='resume_item resume_about'>
        <div class='title'>
          <p class='bold'>About me</p>
        </div>
        <p>
          <?= $intro ?>
        </p>
      </div>
      <div class='resume_item resume_work'>
        <div class='title'>
          <p class='bold'>Certificate</p>
        </div>
        <ul>
          <li>
            <div class='info'>
              <p class='semi-bold'><?= $certificate ?></p>
            </div>
          </li>
        </ul>
        <div class='resume_item resume_education'>
          <div class='title'>
            <p class='bold'>Work Experience</p>
          </div>
          <ul>
            <?php foreach ($experienceData as $experience) { ?>
              <li>
                <div class='info'>
                  <p class='semi-bold'><?= $experience['title'] ?></p>
                  <p><?= $experience['description'] ?></p>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class='resume_item resume_education'>
        <div class='title'>
          <p class='bold'>Education</p>
        </div>
        <ul>
          <?php foreach ($educationData as $education) { ?>
            <li>
              <div class='info'>
                <p class='semi-bold'><?= $education['title'] ?></p>
                <p><?= $education['description'] ?></p>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class='printCV' style='display:flex; justify-content:center;align-items:center;'>
    <a id='printBtn' style='padding: 20px 40px; background-color: #547638; text-decoration:none; border-radius:10px; color:#fff;' href='#' onclick='printDocument();'>Print PDF</a>
  </div>
</body>

</html>
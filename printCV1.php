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
// echo $avt;
// echo $fullName;
//Get data from education table
$sql = "SELECT title,description FROM education WHERE resume_id = $resume_id";
$stmt = $mysqli->prepare($sql);
//$stmt->bind_param('i', $resume_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
  $data = array();
  $i = 0;
  while($row = $result->fetch_assoc()) {
    $data[$i++] = $row;
}
}
  $titleEdu = array();
  $descriptionEdu = array();
  for($j = 0;$j < $i;$j++){
    $titleEdu[$j] = $data[$j]['title'];
    $descriptionEdu[$j] = $data[$j]['description'];
    
  }
  // print_r($title[1]);
  // print_r($description[1]);


  //get data from experience table 
  $sql = "SELECT title, description FROM experience WHERE resume_id = $resume_id";
  $stmt = $mysqli->prepare($sql);
//$stmt->bind_param('i', $resume_id);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows > 0) {
    $data = array();
    $i = 0;
    while($row = $result->fetch_assoc()) {
      $data[$i++] = $row;
  }
  }
    $titleExp = array();
    $descriptionExp = array();
    for($j = 0;$j < $i;$j++){
      $titleExp[$j] = $data[$j]['title'];
      $descriptionExp[$j] = $data[$j]['description'];
      
    }

  echo "
  <!DOCTYPE html>
<html lang='en'>
  <!-- divinectorweb.com -->
  <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Responsive Resume website html css</title>
    <link
      href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap'
      rel='stylesheet'
    />
    <link rel='stylesheet' href='/Assignment Web/tem2/style2.css' />
  </head>
  <body>
    <div class='container'>
      <div class='header'>
        <div class='img-area'>
          <img src='$avt' alt='' />
        </div>
        <h1>$fullName</h1>
        <h3>$nameOfCV</h3>
      </div>

      <div class='main'>
        <div class='left'>
          <h2>Personal Information</h2>
          <p><strong>Name:</strong> $fullName</p>
          <p><strong>Birthday:</strong> $dateOfBirth</p>
          <p><strong>Email:</strong> $mail</p>
          <p><strong>Phone:</strong> $phone</p>
          <h2>Skills</h2>
          <ul>
            $skill
          </ul>
          <h2>Education</h2>
          <h3>$titleEdu[0]</h3>
          <p>$descriptionEdu[0]</p>
          <br />
          <h3>$titleEdu[1]</h3>
          <p>$descriptionEdu[1]</p>
        </div>

      
        <div class='right'>
        <h2>Introduction</h2>
        <p> $intro</p>
          <h2>Work Experience</h2>
          <h3>$titleExp[0]</h3>
          <p> $descriptionExp[0]</p>
          
          <br />
          <h3>$titleExp[1]</h3>
          <p> $descriptionExp[1]</p>
        </div>
      </div>
    </div>
    <div class='printCV' style='display:flex; justify-content:center;align-item:center;' > 
        <a style='padding: 20px 40px; background-color: #547638;text-decoration:none;border-radius:10px;color:#fff;' href=''>Print PDF </a>
    </div>
  </body>
</html>
";
?>
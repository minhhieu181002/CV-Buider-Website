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
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='/Assignment Web/tem4/tem4.css' />
  </head>
  <body>
    <script src='https://kit.fontawesome.com/b99e675b6e.js'></script>

    <div class='resume'>
      <div class='resume_left'>
        <div class='resume_profile'>
          <img src='$avt' alt='profile_pic' />
        </div>
        <div class='resume_content'>
          <div class='resume_item resume_info'>
            <div class='title'>
              <p class='bold'>$fullName</p>
              <p class='regular'>$nameOfCV</p>
            </div>
            <ul>
              <li>
                <div class='icon'>
                  <i class='fas fa-map-signs'></i>
                </div>
                <div class='data'>
                  $address
                </div>
              </li>
              <li>
                <div class='icon'>
                  <i class='fas fa-mobile-alt'></i>
                </div>
                <div class='data'>$phone</div>
              </li>
              <li>
                <div class='icon'>
                  <i class='fas fa-envelope'></i>
                </div>
                <div class='data'>$mail</div>
              </li>

            </ul>
          </div>
          <div class='resume_item resume_skills'>
            <div class='title'>
              <p class='bold'>skill's</p>
            </div>
            <ul>
              <li>
                <div class='skill_name'>$skill</div>
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
           $intro
          </p>
        </div>
        <div class='resume_item resume_work'>
          <div class='title'>
          <p class='bold'>Certificate</p>
        </div>
        <ul>
            <li>
              <div class='info'>
                <p class='semi-bold'>$certificate</p>
                
              </div>
            </li>
            
            
          </ul>
          <div class='resume_item resume_education'>
          <div class='title'>
            <p class='bold'>Work Experience</p>
          </div>
          <ul>
            <li>
              <div class='info'>
                <p class='semi-bold'>$titleExp[0]</p>
                <p>
                  $descriptionExp[0]
                </p>
              </div>
            </li>
            <li>
              <div class='info'>
                <p class='semi-bold'>$titleExp[1]</p>
                <p>
                $descriptionExp[1]
                </p>
              </div>
            </li>
            
          </ul>
        </div>
        </div>
        <div class='resume_item resume_education'>
          <div class='title'>
            <p class='bold'>Education</p>
          </div>
          <ul>
            <li>
              <div class='info'>
                <p class='semi-bold'>$titleEdu[0]</p>
                <p>
                  $descriptionEdu[0]
                </p>
              </div>
            </li>
            <li>
              <div class='info'>
                <p class='semi-bold'>$titleEdu[1]</p>
                <p>
                $descriptionEdu[1]
                </p>
              </div>
            </li>
          </ul>
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
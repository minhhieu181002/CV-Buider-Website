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
$sql = "SELECT name,full_name,date_of_birth,address,introduction,phone_number,certificate,mail,experience,education,skill FROM resumes WHERE userId = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $nameOfCV = $row['name'];
        $fullName = $row['full_name'];
        $dateOfBirth = $row['date_of_birth'];
        $address = $row['address'];
        $intro = $row['introduction'];
        $phone = $row['phone_number'];
        $certificate = $row['certificate'];
        $mail = $row['mail'];
        $experience = $row['experience'];
        $education = $row['education'];
        $skill = $row['skill'];

        
        
    }
}
echo "
<!DOCTYPE html>
<html lang='en'>
  
  <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Responsive Resume website html css</title>
    <link
      href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap'
      rel='stylesheet'
    />
    <link rel='stylesheet' href='/tem2/style2.css' />
  </head>
  <body>
    <div class='container'>
      <div class='header'>
        <div class='img-area'>
          <img src='new1.webp' alt='' />
        </div>
        <h1>$fullName</h1>
        <h3>$nameOfCV </h3>
      </div>

      <div class='main'>
        <div class='left'>
          <h2>Introduction</h2>
          <p></strong> $intro</p>
          <h2>Personal Information</h2>
          <p><strong>Name:</strong> $fullName</p>
          <p><strong>Birthday:</strong> $dateOfBirth</p>
          <p><strong>Email:</strong> $mail</p>
          <p><strong>Phone:</strong> $phone </p>
          <h2>Skills</h2>
          <ul>
            <li>$skill</li>
            
          </ul>
          
        </div>

        <div class='right'>
            <h2>Education</h2>
            <h3>$education </h3>
            
          <p><strong>Position:</strong> Software Developer</p>
          <p><strong>Duration:</strong> 2018-2022</p>
          <ul>
            <li>
              Developed and maintained web applications using React, Node.js,
              and SQL
            </li>
            
          
          </ul>
          <br />
          <h3$experience</h3>
          
        </div>
      </div>
      
    </div>
    <div style='display: flex;
      justify-content: center;
      align-items: center;>
        <a style='background-color:#547638; margin-top:10px; padding:20px 40px' href='printPDF.php'>Print PDF</a>
      </div>
  </body>
</html>

"
?>
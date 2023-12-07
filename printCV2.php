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

        $certificateArr = Array();
        $skillArr = Array();
        $education = Array();
        $expArr = Array();


        $linesCertificate = explode("\n", $row['certificate']);
        
        // store each line separately
        $i = 0;
        foreach ($linesCertificate as $line) {
                $certificateArr[$i] = $line;
                //echo "\n$certificateArr[$i]" ;
                $i+= 1;
            }
        $linesSkillArr = explode("\n", $row['skill']);
        $x = 0;
        foreach ($linesSkillArr as $line) {
            $skillArr[$x] = $line;
            //echo "$skillArr[$x]";
            $x+= 1;
        }

        $linesEducation = explode("\n", $row['education']);
        $j = 0;
        foreach ($linesEducation as $line) {
            $education[$j] = $line;
            //echo "$education[$j]";
            $j+= 1;
        }

        $linesExperience = explode("\n", $row['experience']);
        $e = 0;
        foreach ($linesExperience as $line) {
            $expArr[$e] = $line;
            //echo "$education[$j]";
            $e+= 1;
        }
        
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
    <link rel='stylesheet' href='/Dang-Ass-Web/tem2/style2.css' />
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
            <li>$skillArr[0]</li>
            <li>$skillArr[1]</li>
            <li>$skillArr[2]</li>
          </ul>
          
        </div>

        <div class='right'>
            <h2>Education</h2>
            <h3>$education[0] </h3>
            <p>University of XYZ, 2014-2018</p>
            <br />
            <h3>$education[1]</h3>
            <p>University of XYZ, 2019-2020</p>
            <h2>Work Experience</h2>
            <h3>$expArr[0]</h3>
          <p><strong>Position:</strong> Software Developer</p>
          <p><strong>Duration:</strong> 2018-2022</p>
          <ul>
            <li>
              Developed and maintained web applications using React, Node.js,
              and SQL
            </li>
            
          
          </ul>
          <br />
          <h3>$expArr[1]</h3>
          <p><strong>Position:</strong> Web Developer</p>
          <p><strong>Duration:</strong> 2016-2018</p>
          <ul>
            <li>
              Created and maintained websites using HTML, CSS, and JavaScript
            </li>
          
          
          </ul>
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
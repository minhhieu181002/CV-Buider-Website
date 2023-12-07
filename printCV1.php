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
        $intro = $row['introduction'];
        $address = $row['address'];
        $phone = $row['phone_number'];
        $certificate = $row['certificate'];
        $mail = $row['mail'];
        $experience = $row['experience'];
        $education = $row['education'];
        $skill = $row['skill'];

        // $certificateArr = Array();
        // $skillArr = Array();
        // $education = Array();
        // $expArr = Array();

        // $linesCertificate = explode("\n", $row['certificate']);
        
        // // store each line separately
        // $i = 0;
        // foreach ($linesCertificate as $line) {
        //         $certificateArr[$i] = $line;
        //         //echo "\n$certificateArr[$i]" ;
        //         $i+= 1;
        //     }
        // $linesSkillArr = explode("\n", $row['skill']);
        // $x = 0;
        // foreach ($linesSkillArr as $line) {
        //     $skillArr[$x] = $line;
        //     //echo "$skillArr[$x]";
        //     $x+= 1;
        // }

        // $linesEducation = explode("\n", $row['education']);
        // $j = 0;
        // foreach ($linesEducation as $line) {
        //     $education[$j] = $line;
        //     //echo "$education[$j]";
        //     $j+= 1;
        // }

        // $linesExperience = explode("\n", $row['experience']);
        // $e = 0;
        // foreach ($linesExperience as $line) {
        //     $expArr[$e] = $line;
        //     //echo "$education[$j]";
        //     $e+= 1;
        // }
        
    }
}
      
echo "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <div class='extra'>

      <title>Document</title>
    </div>
    <link rel='stylesheet' href='/tem1/style.css' />
    <link
      rel='stylesheet'
      href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'/>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
      <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>
  </head>
  <body>
    
      <div class='container'>
        <div class='avatar'>
          <img src='new1.webp' alt='' />
        </div>
        <div class='name'>
          <h1>$fullName</h1>
          <div class='specialize'>$nameOfCV</div>
          <ul class='contact'>
            <li><span>P</span> $phone</li>
            <li><span>E</span> $mail</li>
          </ul>
        </div>
        <div class='info'>
          <ul>
            <li>$address</li>
            <li>$dateOfBirth</li>
          </ul>
        </div>
        <div class='intro'>
          <h2>INTRODUCE MYSELF</h2>
          $intro
        </div>
        <div class='experience'>
          <h2>Education</h2>
  
          <div class='item'>
            <h4>Degree and Certificate</h4>
            <div class='des'>
              <ul>
                <li>$certificate</li>
              
              </ul>
            </div>
          </div>
  
          
          <h2 class='skills'>Pofessional Skills</h2>
          <ul>
            <li>$skill</li>
          
          </ul>
        </div>
        <div class='project'>
          <h2>EXPERIENCE</h2>
          <div class='item'>
            <h4>$experience</h4>
            
            
          </div>
  
        
  
          
        </div>
        
      </div>
  
      <div style='display: flex;
      justify-content: center;
      align-items: center; '>

        <a class='btn' style='background-color:#547638; margin-top:20px' href='printCV.php' class='btn'>Print PDF</a>
      </div>
  </body>
  
  "
?>
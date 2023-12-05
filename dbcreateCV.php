<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
//Create connection
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

//insert into UserResume Table (usermail, resumename)
$cvname = $_POST['cvname'];
$mail = $_POST['mail'];
$sql="INSERT INTO userresume (UserMail, ResumeName)
VALUE ('$mail', '$cvname')
";
$conn->query($sql);

//insert into General Table
$fname = $_POST['fname'];
$bday = $_POST['birthday'];
$addr = $_POST['address'];
$website = $_POST['website'];
$skill = $_POST['skill'];
$personalskill = $_POST['personalskill'];
$experience = $_POST['experience'];
$sql="INSERT INTO general (FullName, Birthday, Addr, Mail, Website, ResumeName)
VALUE ('$fname', '$bday', '$addr', '$mail', '$website','$cvname')
";
$conn->query($sql);

//insert into phone table
foreach($_POST as $key => $value){
    if(strpos($key, 'phoneNumber-')===0){
        // array_push($phoneNumbers, $value);
        $sql="INSERT INTO phone (Mail, Phone, ResumeName) VALUE ('$mail','$value','$cvname')";
        $conn->query($sql);
    }
}

//insert into CerDeg table
foreach($_POST as $key => $value){
    if(strpos($key, 'CerDeg-')===0){
        // array_push($phoneNumbers, $value);
        $sql="INSERT INTO cerdeg (Mail, CerDeg, ResumeName) VALUE ('$mail','$value','$cvname')";
        $conn->query($sql);
    }
}



//insert into professionalSkill table


//insert into personalSkill table


//insert into experience table
$conn->close();
header('location: CreateCv.php');
exit;
?>
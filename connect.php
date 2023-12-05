<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
//Create connection
//$conn = new mysqli($servername,$username,$password);
$conn=mysqli_connect('localhost','root','','mydb');
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
?>
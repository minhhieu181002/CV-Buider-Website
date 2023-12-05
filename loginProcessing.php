<?php
// Start the session
session_start();

// Check if the form was submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if both email and password are set
  if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Get the email and password from the form
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Prepare a SQL query to find the user with the entered email
    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();  

    // Check if the user exists and if the password is correct
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['Password'])) {
          // Assign values to session variables
          $_SESSION['email'] = $row['Email'];
          $_SESSION['password'] = $row['Password'];
          $_SESSION['submit'] = true;
          setcookie('auto_login', $row['Email'], time() + 300);
          header("Location: home.php");
        } else {
          echo '<script>window.alert("Incorrect username or password! lew lew");</script>';
          header("Location: loginForm.php");
        }
    } else {
      echo '<script>window.alert("Incorrect username or password!");</script>';
      header("Location: loginForm.php");
    }

    // Close the connection
    $conn->close();
  } else {
    echo '<script>window.alert("Email and password are required!");</script>';
    header("Location: loginForm.php");
  }
} else {
    // Redirect or display an error message if the form was not submitted with POST method
    echo '<script>window.alert("Invalid form submission!");</script>';
    header("Location: loginForm.php");
}
?>
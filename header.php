<?php
    session_start();
  if (!isset($_SESSION['id']) && (!isset($_COOKIE['auto_login']))) {
      // Assuming auto_login cookie stores id
      $id = $_COOKIE['auto_login'];

      // Database connection
      $mysqli = new mysqli("localhost", "root", "", "webass");

      // Fetch user details from the database
      $sql = "SELECT * FROM users WHERE id = ?";
      $stmt = $mysqli->prepare($sql);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($row = $result->fetch_assoc()) {
          // Recreate session variables
          $_SESSION['id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];

          // Optionally refresh the cookie
          setcookie('auto_login', $row['id'], time() + 86400); // Resets expiration time
      }

      // Close the database connection
      $mysqli->close();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Build CV</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google fonts - inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- custom css -->
    <link rel = "stylesheet" href = "assets/css/main.css">
</head>
<body>
    
    <header class = "header">
        <nav class = "navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="container">
                <a class = "navbar-brand fw-bold fs-2" href = "index.php?page=homepage">
                    <span>
                        <i class = "fa-solid fa-file-invoice"></i>
                    </span>
                    <span class = "navbar-brand-text">Create</span> CV
                </a>
                <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navbarContent" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class = "collapse navbar-collapse" id = "navbarContent">
                    <ul class = "navbar-nav ms-auto">
                        <li class = "nav-item dropdown">
                            <a class = "nav-link dropdown-toggle text-white fs-18" href = "#" id = "navbarDropdown" role = "button" data-bs-toggle="dropdown" aria-expanded="false">Select Templates</a>
                            <ul class="dropdown-menu bg-white" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class = "dropdown-item" href = "#printCV">Basic</a>
                                </li>
                                <li>
                                    <a class = "dropdown-item" href = "#printCV">College</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
<!-- 
                    <button type = "button" class = "btn btn-login btn-primary ms-lg-4 px-4 fs-18 mt-3 mt-lg-0">Login/Register</button> -->
                    <?php
                        if(isset($_SESSION['email'])){
                    ?>
                            <a href="#">Welcome, <?php echo $_SESSION['username']; ?></a>
                            <a type = "button" href="usersCV.php" class = "btn btn-login btn-primary ms-lg-4 px-4 fs-18 mt-3 mt-lg-0">My CV</a>
                            <a type = "button" href="index.php?page=logout" class = "btn btn-login btn-primary ms-lg-4 px-4 fs-18 mt-3 mt-lg-0">Logout</a>
                    <?php
                        }
                        else{
                    ?>
                            <a  href="index.php?page=login" class = "btn btn-login btn-primary ms-lg-4 px-4 fs-18 mt-3 mt-lg-0">Login/Register</a>
                        <?php
                        }
                        ?>
                        

                </div>
            </div>
        </nav>
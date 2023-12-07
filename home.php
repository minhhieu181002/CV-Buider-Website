<?php
  session_start();
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
                <a class = "navbar-brand fw-bold fs-2" href = "index.html">
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
                        if(isset($_SESSION['email']) && isset($_SESSION['submit'])){
                    ?>
                            <a type = "button" href="usersCV.php" class = "btn btn-login btn-primary ms-lg-4 px-4 fs-18 mt-3 mt-lg-0">My CV</a>
                            <a type = "button" href="logout.php" class = "btn btn-login btn-primary ms-lg-4 px-4 fs-18 mt-3 mt-lg-0">Logout</a>
                    <?php
                        }
                        else{
                    ?>
                            <a  href="loginForm.php" class = "btn btn-login btn-primary ms-lg-4 px-4 fs-18 mt-3 mt-lg-0">Login/Register</a>
                        <?php
                        }
                        ?>
                        

                </div>
            </div>
        </nav>

        <div class="header-banner">
            <div class="container h-100 d-flex align-items-center justify-content-center">
                <div class = "row text-center justify-content-center">
                    <h1 class = "text-uppercase text-white fw-6 lh-17 display-5">Unleash Potential, Capture Opportunity with <span class = "text-primary">Your CV </span></h1>
                    <p class = "text-white fs-4 mt-3 mb-5">"we empower individuals to create polished, professional resumes effortlessly"</p>
                    <a href="CreateCV.php" class = "btn btn-lg text-capitalize btn-primary btn-banner fs-4">Create your own CV</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- <section class = "steps py-8">
            <div class="container">
                <div class = "row section-title text-center">
                    <div class = "col-12">
                        <h2 class = "display-6 text-blue fw-bold">Create your perfect Resume with easy steps</h2>
                        <p class = "text-grey fs-4 my-4 mx-auto">Effortlessly make a job-worthy resume and cover letter that gets you hired faster.</p>
                    </div>
                </div>

                <div class = "row steps-list">
                    <div class = "steps-item col-lg-6 col-xl-4 text-center text-md-start my-4 d-md-flex align-items-md-center">
                        <div class = "steps-item-icon text-white bg-light-blue d-flex align-items-center justify-content-center mx-auto ms-md-0 me-md-5 me-lg-4">
                            <i class = "fa-solid fa-layer-group fa-2x"></i>
                        </div>
                        <div class="steps-item-text mt-4">
                            <h3 class = "fs-3 fw-4 text-blue">Choose your CV template</h3>
                            <p class = "text-grey fs-18">Pick a template and color of your choice from a variety of professional templates.</p>
                        </div>
                    </div>

                    <div class = "steps-item col-lg-6 col-xl-4 text-center text-md-start my-4 d-md-flex align-items-md-center">
                        <div class = "steps-item-icon text-white bg-light-blue d-flex align-items-center justify-content-center mx-auto ms-md-0 me-md-5 me-lg-4">
                            <i class = "fa-solid fa-file-lines fa-2x"></i>
                        </div>
                        <div class="steps-item-text mt-4">
                            <h3 class = "fs-3 fw-4 text-blue">Place Your Information</h3>
                            <p class = "text-grey fs-18">Keep track of your CV with the help of live preview.</p>
                        </div>
                    </div>

                    <div class = "steps-item col-lg-6 col-xl-4 text-center text-md-start my-4 d-md-flex align-items-md-center">
                        <div class = "steps-item-icon text-white bg-light-blue d-flex align-items-center justify-content-center mx-auto ms-md-0 me-md-5 me-lg-4">
                            <i class = "fa-solid fa-download fa-2x"></i>
                        </div>
                        <div class="steps-item-text mt-4">
                            <h3 class = "fs-3 fw-4 text-blue">Instantly download your CV</h3>
                            <p class = "text-grey fs-18">Easily download your CV as a PDF and share it via a link.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class = "templates py-8 bg-secondary" id="printCV">
            <div class = "container">
                <div class = "row section-title text-center mb-5">
                    <div class = "col-12">
                        <h2 class = "display-6 text-white fw-bold">Choose the best template for your resume</h2>
                        <p class = "text-white fs-4 my-4 mx-auto">A strong CV can significantly impact your chances of landing interviews and ultimately securing your desired job.</p>
                    </div>
                </div>

                <div class = "row templates-list gy-5 gx-lg-5">
                    <div class = "templates-item position-relative col-lg-6">
                        <div class = "template-item-img mx-auto me-lg-0 position-relative">
                            <img src = "assets/images/Basic.jpg" alt = "" class = "img-fluid">
                            <a href = "resume.php" class = "btn btn-lg btn-primary position-absolute choose-template-btn">Print CV</a>
                        </div>
                    </div>

                    <div class = "templates-item position-relative col-lg-6">
                        <div class = "template-item-img mx-auto ms-lg-0 position-relative">
                            <img src = "assets/images/College.jpg" alt = "" class = "img-fluid">
                            <a href = "#" class = "btn btn-lg btn-primary position-absolute choose-template-btn">Print CV</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class = "pt-5">
        <div class = "container my-4">
            <div class = "row gy-5 gx-md-5 text-center text-md-start">
                <div class = "col-md-6 col-xl-4">
                    <a class = "site-logo text-decoration-none fw-bold fs-2" href = "#">
                        <span>
                            <i class = "fa-solid fa-file-invoice"></i>
                        </span>
                        <span class = "site-logo-text">Build</span> CV
                    </a>
                    <p class = "text-grey fs-18 mt-4">Build CV is a CV builder that helps users like you to create stunning CVs within 4 minutes</p>
                </div>

                <div class = "col-md-6 col-xl-2">
                    <h3 class = "text-blue">Build CV</h3>
                    <ul class = "list-unstyled mt-4">
                        <li class = "my-2">
                            <a href = "#" class = "text-decoration-none fs-17 text-dark">Homepage</a>
                        </li>
                        <li class = "my-2">
                            <a href = "#" class = "text-decoration-none fs-17 text-dark">CV Builder</a>
                        </li>
                        <li class = "my-2">
                            <a href = "#" class = "text-decoration-none fs-17 text-dark">CV Templates</a>
                        </li>
                        <li class = "my-2">
                            <a href = "#" class = "text-decoration-none fs-17 text-dark">Login</a>
                        </li>
                    </ul>
                </div>

                <div class = "col-md-6 col-xl-2">
                    <h3 class = "text-blue">Legal</h3>
                    <ul class = "list-unstyled mt-4">
                        <li class = "my-2">
                            <a href = "#" class = "text-decoration-none fs-17 text-dark">Privacy Policy</a>
                        </li>
                        <li class = "my-2">
                            <a href = "#" class = "text-decoration-none fs-17 text-dark">Use of Terms</a>
                        </li>
                    </ul>
                </div>

                <div class = "col-md-6 col-xl-4">
                    <h3 class = "text-blue">Help Center</h3>
                    <p class = "fs-17 mt-3">Contact: <a href = "mailto:support@buildcv.com" class="text-decoration-none text-blue">support@buildcv.com</a></p>
                </div>
            </div>
        </div>

        <div class = "container-fluid copyright-text pt-4 pb-3">
            <p class = "text-center fw-3">&copy; 2022 BuildCv. All rights reserved</p>
        </div>
    </footer>




    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>
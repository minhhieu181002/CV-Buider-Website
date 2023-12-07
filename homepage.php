<?php
include'header.php';
?> 
<!-- //     session_start();
//     if (!isset($_SESSION['id']) && isset($_COOKIE['auto_login'])) {
//       // Assuming auto_login cookie stores id
//       $id = $_COOKIE['auto_login'];

//       // Database connection
//       $mysqli = new mysqli("localhost", "root", "", "WebAss");

//       // Fetch user details from the database
//       $sql = "SELECT * FROM users WHERE id = ?";
//       $stmt = $mysqli->prepare($sql);
//       $stmt->bind_param('i', $id);
//       $stmt->execute();
//       $result = $stmt->get_result();

//       if ($row = $result->fetch_assoc()) {
//           // Recreate session variables
//           $_SESSION['id'] = $row['id'];
//           $_SESSION['username'] = $row['username'];
//           $_SESSION['email'] = $row['email'];

//           // Optionally refresh the cookie
//           setcookie('auto_login', $row['id'], time() + 300); // Resets expiration time
//       }

//       // Close the database connection
//       $mysqli->close();
//   }
//?>  -->
<body>
    
    <header class = "header">
        <!-- navbar here -->
        <div class="container mt-4">
        </div>
        <div class="header-banner">
            <div class="container h-100 d-flex align-items-center justify-content-center">
                <div class = "row text-center justify-content-center">
                    <h1 class = "text-uppercase text-white fw-6 lh-17 display-5">Unleash Potential, Capture Opportunity with <span class = "text-primary">Your CV </span></h1>
                    <p class = "text-white fs-4 mt-3 mb-5">"we empower individuals to create polished, professional resumes effortlessly"</p>
                    <a href="index.php?page=createCV" class = "btn btn-lg text-capitalize btn-primary btn-banner fs-4">Create your own CV</a>
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

    <footer class = "pt-5" style="background-color: white">
        <div class = "container my-4 " ;">
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

                <div class = "col-md-6 col-xl-2 " ;">
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
<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create Résumé</title>
</head>

<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        // There is no active session, start a new one
        session_start();
    }


    // Check if the user is not logged in
    if (!isset($_SESSION['id'])) {
        header("Location: index.php?page=login");
        exit();
    }
    ?>
    <div class="container py-5 rounded">
        <h3 class="text-center text-white">Create Resume</h3>
        <p class="text-center text-danger fw-bold">Please type in your information</p>
        <form action="dbcreateCV.php" method="POST" enctype="multipart/form-data" class="border p-3 bg-white">
            <div class="mb-3">
                <label for="name" class="form-label">Resume Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Upload Avatar</label>
                <input type="file" class="form-control form-control-sm" id="avatar" name="avatar">
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="full_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="full_name" name="full_name" required>
                </div>
                <div class="col-md-6">
                    <label for="date_of_birth" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-sm" id="date_of_birth" name="date_of_birth" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="mail" class="form-label">Mail<span class="text-danger">*</span></label>
                    <input type="email" class="form-control form-control-sm" id="mail" name="mail" required>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="address" name="address" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number<span class="text-danger">*</span></label>
                <textarea class="form-control form-control-sm" id="phone_number" name="phone_number" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="introduction" class="form-label">Introduction<span class="text-danger">*</span></label>
                <textarea class="form-control form-control-sm" id="introduction" name="introduction" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="certificate" class="form-label">Certificate/Degree<span class="text-danger">*</span></label>
                <textarea class="form-control form-control-sm" id="certificate" name="certificate" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="experience" class="form-label">Experience<span class="text-danger">*</span></label>
                <textarea class="form-control form-control-sm" id="experience" name="experience" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="education" class="form-label">Education<span class="text-danger">*</span></label>
                <textarea class="form-control form-control-sm" id="education" name="education" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="skill" class="form-label">Skill<span class="text-danger">*</span></label>
                <textarea class="form-control form-control-sm" id="skill" name="skill" rows="4" required></textarea>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary btn-sm w-50">Submit</button>
            </div>
        </form>
    </div>
    <script>
        // uploadImage function
        const uploadImage = async (image) => {
            try {
                const formDataToUpload = new FormData();
                formDataToUpload.append('image', image);
                const endpoint = "https://api.imgbb.com/1/upload?key=26ea7ee46d4e0cda0646c37f2bff4e07";

                const response = await fetch(endpoint, {
                    method: 'POST',
                    body: formDataToUpload,
                });

                if (response.ok) {
                    const data = await response.json();
                    return data.data.url;
                } else {
                    return 'There was an error uploading the image.';
                }
            } catch (error) {
                return 'Error occurred during image upload.';
            }
        }

        // Form submission handling
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const avatarInput = document.getElementById('avatar');
                if (avatarInput.files.length > 0) {
                    const uploadedImageUrl = await uploadImage(avatarInput.files[0]);
                    if (typeof uploadedImageUrl === 'string') {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'avatar_url';
                        hiddenInput.value = uploadedImageUrl;
                        form.appendChild(hiddenInput);
                    }
                }

                form.submit();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
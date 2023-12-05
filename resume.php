<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="icon" href="logo.png">
    <title>Resume</title>
</head>

<body>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: black;
            font-family: 'Poppins', sans-serif;
            font-size: 12pt;

            background: rgb(249, 249, 249);
            background: radial-gradient(circle, rgba(249, 249, 249, 1) 0%, rgba(240, 232, 127, 1) 49%, rgba(246, 243, 132, 1) 100%);
            /* background-image: url(./tiles/tile23.jpg); */
            background-attachment: fixed;
        }

        * {
            margin: 0px;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {

            width: 21cm;
            min-height: 29.7cm;
            padding: 0.5cm;
            margin: 0.5cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {


            /* height: 256mm; */


        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        * {
            transition: all .2s;
        }

        table {
            border-collapse: collapse;
        }

        .pr {
            padding-right: 30px;
        }

        .pd-table td {
            padding-right: 10px;
            padding-bottom: 3px;
            padding-top: 3px;
        }
    </style>

</body>

<?php
    $sql_cer_deg = "SELECT CerDeg FROM cerdeg";
    $sql_general = "SELECT FullName,Birthday,Addr,Mail,Website, Skills,PersonalSkills,Experience FROM general";
    $sql_phone = "SELECT Phone FROM phone";
    $sql_user_resume = "SELECT ResumeName FROM userresume ";

    $result_cer_deg = $conn->query($sql_cer_deg);
    $result_general = $conn->query($sql_general);
    $result_phone = $conn->query($sql_phone);
    $result_user_resume = $conn->query($sql_user_resume);
    if ($result_cer_deg->num_rows > 0) {
        while ($row = $result_cer_deg->fetch_assoc()) {
            $CerDeg = $row['CerDeg'];
        }
    } 
    if($result_general->num_rows >0 ){
        while ($row = $result_general->fetch_assoc()){
            $fullname = $row['FullName'];
            $birthday = $row['Birthday'];
            $addr = $row['Addr'];
            $email = $row['Mail'];
            $website = $row['Website'];
            $Skills = $row ['Skills'];
            $PersonalSkills = $row['PersonalSkills'];
            $experience = $row['Experience'];
        }
    }
    if($result_phone->num_rows >0 ){
        while ($row = $result_phone->fetch_assoc()){
            $phoneNumber = $row['Phone'];
        }
    }
    if($result_user_resume->num_rows >0) {
        while ($row = $result_user_resume->fetch_assoc()){
            $user_resume = $row['ResumeName'];
        }
    }
    else {
        echo "No data found";
    }
    
    $conn->close();
?>
<?php
    echo "<div class='page'>
    <div class='subpage'>
        <table class='w-100'>
            <tbody>
                <tr>
                    <td colspan='2' class='text-center fw-bold fs-4'>$user_resume</td>
                </tr>
                <tr>
                    <td></td>  
                    <td class='personal-info zsection'>
                        <div class='fw-bold name'>$fullname</div>
                        <div>Mobile : <span class='mobile'>$phoneNumber</span></div>
                        <div>Email : <span class='email'>$email</span></div>
                        <div>Address : <span class='address'>$addr</span></div>
                        <hr>
                    </td>
                </tr>

                <!-- <tr class='objective-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Objective</td>
                    <td class='pb-3 objective'>
                        To be a part of an organization where get a chance to use my knowledge
                        and skills to contribute in the progress of the organizations as well as myself.
                    </td>
                </tr> -->

                <tr class='experience-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Experience</td>
                    <td class='pb-3 experiences'>

                        <div class='experience mb-2'>
                            <div class='fw-bold'>- <span class='job-role'>$experience</span> 
                            
                        </div>

                    </td>
                </tr>

                <tr class='education-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Education</td>
                    <td class='pb-3 educations'>

                        <div class='education mb-2'>
                           <div class='fw-bold'>- <span class='course'>$CerDeg (Programme)</span></div>
                            
                        </div>



                    </td>
                </tr>

                <tr class='skills-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Professional Skills</td>
                    <td class='pb-3 skills'>

                        <div class='skill'>- $Skills</div>
                        <div class='skill'>- MS Office (Word,Excel,Powerpoint)</div>

                    </td>
                </tr>
                
                <tr class='skills-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Website</td>
                    <td class='pb-3 skills'>

                        <div class='skill'>- $PersonalSkills</div>

                    </td>
                </tr>
                <tr class='skills-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Personal Skills</td>
                    <td class='pb-3 skills'>

                        <div class='skill'>- $website</div>

                    </td>
                </tr>
<!-- 
                <tr class='personal-details-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Personal Skills</td>
                    <td class='pb-3'>
                        <table class='pd-table'>
                            <tr>
                                <td>Date of Birth</td>
                                <td>: <span class='date-of-birth'></span></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>: <span class='gender'>Female</span></td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td>: <span class='religion'>Muslim</span></td>
                            </tr>
                            <tr>
                                <td>Nationality</td>
                                <td>: <span class='nationality'>Indian</span></td>
                            </tr>
                            <tr>
                                <td>Marital Status</td>
                                <td>: <span class='marital-status'>Un-Married</span></td>
                            </tr>
                            <tr>
                                <td>Hobbies</td>
                                <td>: <span class='hobbies'>Listening Music</span></td>
                            </tr>

                        </table>

                    </td>
                </tr>

                <tr class='languages-known-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Languages Known</td>
                    <td class='pb-3 languages'>

                        English & Hindi
                    </td>
                </tr> -->

                <!-- <tr class='declaration-section zsection'>
                    <td class='fw-bold align-top text-nowrap pr title'>Declaration</td>
                    <td class='pb-5 declaration'>
                        I hereby declare that above information is correct to the best of my
                        knowledge and can be supported by relevant documents as and when
                        required.
                    </td>
                </tr> -->
                <!-- <tr>
                    <td class='px-3'>Date : </td>
                    <td class='px-3 name text-end'>Najia Bano</td>

                </tr> -->
            </tbody>
        </table>
    </div>

</div>"
?>


</html>
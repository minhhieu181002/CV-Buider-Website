<?php 
include 'connect.php';

//Create database
$sql = "CREATE DATABASE IF NOT EXISTS mydb  ";
$conn->query($sql);
$conn->close();

$conn=new mysqli($servername,$username,$password,$dbname);
//Create UserResume Table
$sql = "CREATE TABLE IF NOT EXISTS UserResume(
            UserMail VARCHAR(255),
            ResumeName VARCHAR(255)
)";
$conn->query($sql);

//Create General Table
$sql = "CREATE TABLE IF NOT EXISTS General(
    FullName VARCHAR(255),
    Birthday DATETIME,
    Addr VARCHAR(500),
    Mail VARCHAR(255),
    Website VARCHAR(255),
    Skills VARCHAR(500),
    PersonalSkills VARCHAR(500),
    Experience VARCHAR(500),
    ResumeName VARCHAR(255)
)";
$conn->query($sql);

//Create Phone Table
$sql = "CREATE TABLE IF NOT EXISTS Phone(
    Mail VARCHAR(255),
    Phone VARCHAR(255),
    ResumeName VARCHAR(255)
)";
$conn->query($sql);

//Create Certificate/Degree Table
$sql = "CREATE TABLE IF NOT EXISTS CerDeg(
    Mail VARCHAR(255),
    CerDeg VARCHAR(255),
    ResumeName VARCHAR(255)
)";
$conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        form #inside{
    width: 100% !important;
    display: flex;
    flex-direction: column;
    margin: auto;
}

body{
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #383838;
    /* background-image: url(background\(8\).jpg);
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center; */
    }
.card{
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}
.blue-text{
    color: #ffff;
}
.primary-color {
    color: #547638;
}
.form-control-label{
    margin-bottom: 0
}
input, textarea, button{
    padding: 8px 15px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid black;
    font-size: 18px !important;
    font-weight: 300}
input:focus, textarea:focus{
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}
.btn-block{
    text-transform: uppercase;
    font-size: 15px !important;
    font-weight: 400;
    height: 43px;
    width: 90px;
    cursor: pointer
}
.btn-block:hover{
    color: #fff !important
}
.btn-login{
    padding-top: 14px;
    padding-bottom: 14px;
    transition: var(--transition);
}
.btn-login:hover{
    background-color: #e7eefa!important;
    border-color: #e7eefa!important;
    color: var(--primary-color)!important;
}
button:focus{
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}
    </style>
    <title>Create Résumé</title>
    <link rel="stylesheet"  href="/assets//css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3 class="primary-color" >Create Résumé</h3>
            <p class="blue-text" style="font-weight: bold">Please type in your information</p>
            <div class="card">
                <h5 class="text-center mb-4">Your Résumé</h5>
                <form action="dbcreateCV.php" method="POST" class="form-card">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex" style="margin:auto; text-align:center;"> 
                            <label class="form-control-label px-3">CV Name<span class="text-danger"> *</span></label> 
                            <input class="form-control" type="text" id="cvname" name="cvname" style="text-align: center" placeholder="Name of CV"> 
                            <span class="text-danger" id="cvname_err"></span> <!--Show error when user type in!-->
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Full Name<span class="text-danger"> *</span></label>
                            <input type="text" id="fname" name="fname" placeholder="Please enter your full name!">
                            <span class="text-danger" id="fname_err"></span> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Date of birth<span class="text-danger"> *</span></label> 
                            <input type="date" id="birthday" name="birthday" placeholder="Please enter your date of birth!">
                            <span class="text-danger" id="birthday_err"></span> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                            <label class="form-control-label px-3">Address<span class="text-danger"> *</span></label> 
                            <input type="text" id="address" name="address" placeholder="Address"> 
                            <span class="text-danger" id="address_err"></span>
                        </div>
                    </div>
                    <!-- From here, create modal form to input phone Numbers -->
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <!-- Button trigger modal -->
                            <label class="form-control-label px-3">Phone Numbers<span class="text-danger"> *</span></label>
                            <button type="button" id="phonebutton" class="btn btn-primary" data-bs-toggle="modal" style="background-color: #547638" data-bs-target="#ModalPhone">
                                Add phone number
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="ModalPhone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Phone Number</h1>
                                        </div>
                                    <div class="modal-body">
                                        <div id="phoneNumberList" style="overflow-y: auto; height:100px;"></div>
                                        <input class="col-sm-12" type="text" id="phone" name="phone" placeholder="Type your phone number"> 
                                        <span class="text-danger" id="phone_err"></span>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" style="background-color: #547638" data-bs-dismiss="modal">Close</button>
                                            <button type="button" name="submitphone" class="btn btn-secondary" style="background-color: #547638" id="phone_submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- To here, input phone number -->

                    <!-- From here, input Certificate/Degree through modal form -->
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <!-- Button trigger modal -->
                            <label class="form-control-label px-3">Certificate/Degree<span class="text-danger"> *</span></label>
                            <button type="button" id="CerDegbutton" class="btn btn-primary" data-bs-toggle="modal" style="background-color: #547638" data-bs-target="#ModalCerDeg">
                                Add Certificate/Degree
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="ModalCerDeg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Certificate/Degree</h1>
                                        </div>
                                    <div class="modal-body">
                                        <div id="CerDegList" style="overflow-y: auto; height:100px;"></div>
                                        <input class="col-sm-12" type="text" id="CerDeg" name="CerDeg" placeholder="Type your Certificate/Degree"> 
                                        <span class="text-danger" id="CerDeg_err"></span>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" style="background-color: #547638" data-bs-dismiss="modal">Close</button>
                                            <button type="button" name="submitCerDeg" class="btn btn-secondary" style="background-color: #547638" id="CerDeg_submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- These 2 divs are used to store phone numbers and certificate -->
                    <div id='phoneNumberContainer'></div>
                    <div id='CerDegContainer'></div>
                    

                    
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                            <label class="form-control-label px-3">Mail<span class="text-danger"> *</span></label> 
                            <input type="text" id="mail" name="mail" placeholder="Type your email"> 
                            <span class="text-danger" id="mail_err"></span>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                            <label class="form-control-label px-3">Website (Optional)</label> 
                            <input type="text" id="website" name="website" placeholder="In case you have your own website, type in the full URL!">
                            <span class="text-danger" id="website_err"></span>
                        </div>
                    </div>

                    <div class="row justify-content-between  text-left" ">
                        <div class="form-group col-sm-12 flex-column d-flex" id="AddProSkill"> 
                            <label class="form-control-label px-3">Professional Skills (Optional)</label> 
                            <input type="text" id="skill" name="skill" placeholder="Type in your professional skill"> 
                        <!-- add  -->
                        <button type="button" id="addBtnPro" class=" btn btn-block blue-text " onclick="AddProject()"  style="background-color: #547638" data-bs-target="#ModalProfessionalSkill"> Add+ </button>

                        <!-- modal -->
                        <!-- <div class="modal fade" id="ModalProfessionalSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Professional Skills</h1>
                                        </div>
                                    <div class="modal-body">
                                        <div id="ProSkillList" style="overflow-y: auto; height:100px;"></div>
                                        <input class="col-sm-12" type="text" id="ProSkill" name="ProSkill" placeholder="Type your Professional Skills"> 
                                        <span class="text-danger" id="ProSkill_err"></span>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" style="background-color: #547638" data-bs-dismiss="modal">Close</button>
                                            <button type="button" name="submitProSkill" class="btn btn-secondary" style="background-color: #547638" id="ProSkill_submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                        </div> -->
                    </div>
                        
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                            <label class="form-control-label px-3">Personal Skills (Optional)</label> 
                            <input type="text" id="personalskill" name="personalskill" placeholder="Type your personal skills, e.g teamwork, creative..."> 

                            <!-- add -->
                            <button type="button" id="addPerSkill"  class=" btn btn-block blue-text " data-bs-toggle="modal"   style="background-color: #547638" data-bs-target="#ModalPersonalSkill"> Add+ </button>

                            <!-- modal form -->
                            <!-- <div class="modal fade" id="ModalPersonalSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Personal Skills</h1>
                                        </div>
                                    <div class="modal-body">
                                        <div id="CerDegList" style="overflow-y: auto; height:100px;"></div>
                                        <input class="col-sm-12" type="text" id="CerDeg" name="CerDeg" placeholder="Type your personal skills, e.g teamwork, creative..."> 
                                        <span class="text-danger" id="CerDeg_err"></span>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" style="background-color: #547638" data-bs-dismiss="modal">Close</button>
                                            <button type="button" name="submitCerDeg" class="btn btn-secondary" style="background-color: #547638" id="CerDeg_submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                            
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> 
                            <label class="form-control-label px-3">Experience (Optional)</label> 
                            <input type="text" id="experience" name="experience" placeholder="Type your job experience, e.g 2 years working at Renesas..."> 

                            <button type="button" id="addProSkill" class=" btn btn-block blue-text " data-bs-toggle="modal" style="background-color: #547638" data-bs-target="#addExperience"> Add+ </button>

                            <div class="modal fade" id="addExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Experience</h1>
                                        </div>
                                    <div class="modal-body">
                                        <div id="CerDegList" style="overflow-y: auto; height:100px;"></div>
                                        <input class="col-sm-12" type="text" id="CerDeg" name="CerDeg" placeholder="Type your experience here..."> 
                                        <span class="text-danger" id="CerDeg_err"></span>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" style="background-color: #547638" data-bs-dismiss="modal">Close</button>
                                            <button type="button" name="submitCerDeg" class="btn btn-secondary" style="background-color: #547638" id="CerDeg_submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row justify-content-end text-center">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary" name="submit" style="background-color: #547638" id="submit_form">Submit</button> </div>
                        <div class="form-group col-sm-6"> <button type="button" class="btn-block btn-primary" style="background-color: #547638" id="reset">Reset</button> </div>
                        <!-- add -->
                    </div>
                    <span class="text-danger" style="text-align:center;" id="submit_form_err"></span>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="./CreateCV.js"></script>
</body>
</html>
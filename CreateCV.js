let openphonenumberlist=false;  //Used to check if the user input 1 time before
let openCerDeglist=false;   //Used to check if the user input 1 time before
let openProSkillList = false;
//Here is to print all entered phone
const phoneNumberList = document.getElementById('phoneNumberList');
const phoneNumberElement = document.createElement('p');
phoneNumberElement.textContent = 'Existed phone numbers: ';
phoneNumberList.appendChild(phoneNumberElement);
function generatePhoneNumberList(){
    for(const key in sessionStorage){
        if(key.startsWith('phoneNumber-')){
            const phoneNumber = sessionStorage.getItem(key);

            const phoneNumberElement = document.createElement('p');
            phoneNumberElement.textContent = phoneNumber;

            phoneNumberList.appendChild(phoneNumberElement);
        }
    }
}

//Here is to print all entered Certificate/Degree
const CerDegList = document.getElementById('CerDegList');
const CerDegElement = document.createElement('p');
CerDegElement.textContent = 'Existed Certificate/Degree: ';
CerDegList.appendChild(CerDegElement);
function generateCerDegList(){
    for(const key in sessionStorage){
        if(key.startsWith('CerDeg-')){
            const CerDeg = sessionStorage.getItem(key);

            const CerDegElement = document.createElement('p');
            CerDegElement.textContent = CerDeg;

            CerDegList.appendChild(CerDegElement);
        }
    }
}
//Here is to print all entered Professional Skill
const ProfessionalSkillList = document.getElementById('ProSkill');
const ProSkillElement = document.createElement('p');
ProSkillElement.textContent = 'Existed professional skill ';
ProfessionalSkillList.appendChild(ProSkillElement);
function generateProSkillList(){
    for(const key in sessionStorage){
        if(key.startsWith('ProSkill-')){
            const ProSkill = sessionStorage.getItem(key);

            const ProSkillElement = document.createElement('p');
            ProSkillElement.textContent = ProSkill;

            ProfessionalSkillList.appendChild(ProSkillElement);
        }
    }
}
//Here is to print all entered Personal Skill

//Here is to print all entered Experience


$(document).ready(function(){
    $('#cvname').blur(function(){
        $('#submit_form_err').html('');
        checkcvname();
        // var input = $(this).val();
        // if(input!=''){
        //     console.log('in');
        //     $.ajax({
        //         url:"validationCVname.php",
        //         type:"POST",
        //         data: {datane:input},
        //         success: function(response){
        //             const parsedResponse = JSON.parse(response);
        //             const message = parsedResponse.message;
        //             if(message==false){
        //                 console.log('hellohehe');
        //                 $('#cvname_err').html("Existed CV's name!");
        //             }
        //         }
        //     });
        // }
    });
    $('#fname').on('input', function(){
        $('#submit_form_err').html('');
        checkfname();
    });
    $('#birthday').on('input', function(){
        $('#submit_form_err').html('');
        checkbirthday();
    });
    $('#address').on('input', function(){
        $('#submit_form_err').html('');
        checkaddress();
    });
    $('#phone').on('input', function(){
        $('#submit_form_err').html('');
        checkphone();
    });
    const submitphone = document.getElementById('phone_submit');
    submitphone.addEventListener('click', function() {
        var x = document.getElementById('phone_submit');
        x.disabled=true;
        console.log('alert');
        if(checkphone()==1){
            let duplicate=false;
            for(const key in sessionStorage){
                if(key.startsWith('phoneNumber-')){
                    const existedNumber = sessionStorage.getItem(key);
                    if(existedNumber===document.getElementById('phone').value){
                        duplicate=true;
                        break;
                    }
                }
            }
            if(!duplicate){
                console.log('inside');
                var phone=document.getElementById('phone').value;
                sessionStorage.setItem('phoneNumber-'+phone, phone);
                $('#ModalPhone').modal('hide');
                document.getElementById('phone').value='';
                const phoneNumberElement = document.createElement('p');
                phoneNumberElement.textContent = phone;

                phoneNumberList.appendChild(phoneNumberElement);
                addPhoneinput(phone);
            } else {
                $('#phone_err').html('Already existed phone number!');
            }
        }
    });
    $('#phonebutton').on('click', function(){
        $('#submit_form_err').html('');
        if(!openphonenumberlist){
            generatePhoneNumberList();
            openphonenumberlist=true;
        }
    });
    $('#CerDegbutton').on('click', function(){
        $('#submit_form_err').html('');
        if(!openCerDeglist){
            generateCerDegList();
            openCerDeglist=true;
        }
    });
    const submitCerDeg = document.getElementById('CerDeg_submit');
    submitCerDeg.addEventListener('click', function(){
        var x = document.getElementById('CerDeg_submit');
        x.disabled=true;
        console.log('alert');
        if(checkCerDeg()==1){
            let duplicate=false;
            for(const key in sessionStorage){
                if(key.startsWith('CerDeg-')){
                    const existedCerDeg = sessionStorage.getItem(key);
                    if(existedCerDeg===document.getElementById('CerDeg').value){
                        duplicate=true;
                        break;
                    }
                }
            }
            if(!duplicate){
                console.log('inside');
                var CerDeg=document.getElementById('CerDeg').value;
                sessionStorage.setItem('CerDeg-'+CerDeg, CerDeg);
                $('#ModalCerDeg').modal('hide');
                document.getElementById('CerDeg').value='';
                const CerDegElement = document.createElement('p');
                CerDegElement.textContent = CerDeg;

                CerDegList.appendChild(CerDegElement);
                addCerDeginput(CerDeg);
            } else {
                $('#CerDeg_err').html('Already existed Certificate/Degree!');
            }
        }
    });

    const submitProSkill = document.getElementById('ProSkill_submit');
    submitProSkill.addEventListener('click', function(){
        var x = document.getElementById('ProSkill_submit');
        x.disabled = true;
       
                console.log('inside');
                var ProSkill=document.getElementById('ProSkill').value;
                sessionStorage.setItem('ProSkill-'+ProSkill, ProSkill);
                $('#ModalProfessionalSkill').modal('hide');
                document.getElementById('ProSkill').value='';
                const ProSkillElement = document.createElement('p');
                ProSkillElement.textContent = ProSkill;

                ProSkillElementList.appendChild(ProSkillElement);
                addProSkillinput(ProSkill);
    });

    $('#submit_form').on('click', function(){
        if(!checkcvname() || !checkfname() || !checkbirthday() || !checkaddress() || !existedphone() || !existedCerDeg() || !checkmail() || !checkwebsite()){
            $('#submit_form_err').html('Please fill/correct all required input!');
            return false;
        }
        sessionStorage.clear();
        // var phoneNumbers=[];
        // for(const key in sessionStorage){
        //     if(key.startsWith('phoneNumber-')){
        //         phoneNumbers.push(sessionStorage.getItem(key));
        //     }
        // }

        // const phoneNumberContainer = document.getElementById('phoneNumberContainer');
        // for(const phoneNumber of phoneNumbers){
        //     const newPhoneNumberInput = document.createElement('input');
        //     newPhoneNumberInput.type = 'hidden';
        //     newPhoneNumberInput.name = 'phoneNumber-'+phoneNumber;
        //     newPhoneNumberInput.value = phoneNumber;
        // }
        // var cvname = $('#cvname').val();
        // var mail = $('#mail').val();
        // var fname = $('#fname').val();
        // var birthday = $('#birthday').val();
        // var address = $('#address').val();
        // var website = $('#website').val();
        // var skill = $('#skill').val();
        // var personalskil = $('#personalskill').val();
        // var experience = $('#experience').val();
        // var dataForm={
        //     cvname: cvname, mail: mail, fname: fname, birthday: birthday, address: address, website: website, skill: skill,
        //     personalskill: personalskil, experience: experience, phone: phoneNumbers
        // };
        // var jsondataForm=JSON.stringify(dataForm);
        // $.ajax({
        //     url: 'dbcreateCV.php',
        //     type: "POST",
        //     data:{
        //         cvname: cvname, mail: mail, fname: fname, birthday: birthday, address: address, website: website, skill: skill,
        //         personalskill: personalskil, experience: experience, phone: phoneNumbers
        //     },
        //     success: (response) => {
        //         alert('suc');
        //         console.log('Phone numbers sent successfully');
        //     },
        //     error: (error) => {
        //         alert('error');
        //         console.log('failed');
        //         console.error('Error sending phone numbers: ', error.message);
        //     }
        // });
        return true;
    });

    $('#mail').on('input', function(){
        $('#submit_form_err').html('');
        checkmail();
    });
    $('#website').on('input', function(){
        checkwebsite();
    });
    $('#CerDeg').on('input', function(){
        checkCerDeg();
    });

    $('#reset').on('click', function(){
        sessionStorage.clear();
        window.location.href('CreateCV.php');
    });
});

function addPhoneinput(phoneNumber){
    const phoneNumberContainer = document.getElementById('phoneNumberContainer');
    const newPhoneNumberInput = document.createElement('input');
    newPhoneNumberInput.type = 'hidden';
    newPhoneNumberInput.name = 'phoneNumber-'+phoneNumber;
    newPhoneNumberInput.value = phoneNumber;
    phoneNumberContainer.appendChild(newPhoneNumberInput);
}

function addCerDeginput(CerDeg){
    const CerDegContainer = document.getElementById('CerDegContainer');
    const newCerDegInput = document.createElement('input');
    newCerDegInput.type = 'hidden';
    newCerDegInput.name = 'CerDeg-'+CerDeg;
    newCerDegInput.value = CerDeg;
    CerDegContainer.appendChild(newCerDegInput);
}
function addProSkillinput(ProSkill){
    const ProSkillContainer = document.getElementById('ProSkillContainer');
    const newProSkillInput = document.createElement('input');
    newProSkillInput.type = 'hidden';
    newProSkillInput.name = 'ProSkill-'+ProSkill;
    newProSkillInput.value = ProSkill;
    ProSkillContainer.appendChild(newProSkillInput);
}

function existedphone(){
    for(const key in sessionStorage){
        if(key.startsWith('phoneNumber-')) return true;
    }
    return false;
}

function existedCerDeg(){
    for(const key in sessionStorage){
        if(key.startsWith('CerDeg-')) return true;
    }
    return false;
}

function checkcvname(){
    var cvname = $('#cvname').val();
    if(cvname==""){
        $('#cvname_err').html('Required CV name!');
        return false;
    } else {
        var check;
        $('#submit_form_err').html('');
        var input = cvname;
        if(input!=''){
            console.log('in');
            $.ajax({
                url:"validationCVname.php",
                type:"POST",
                async:false,
                data: {datane:input},
                success: function(response){
                    const parsedResponse = JSON.parse(response);
                    const message = parsedResponse.message;
                    if(message==true){
                        console.log('hellohehe');
                        check=true;
                        $('#cvname_err').html("Existed CV's name!");
                    }
                }
            });
        }
        if(check==true) return false;
    }
    $('#cvname_err').html('');
    return true;
}

function checkfname(){
    var fname = $('#fname').val();
    if(fname==""){
        $('#fname_err').html('Required full name!');
        return false;
    }
    $('#fname_err').html('');
    return true;
}

function checkbirthday(){
    var today = new Date();
    var currentDate = today.getDate();
    var currentMonth = today.getMonth() + 1;
    var currentYear = today.getYear() + 1900;

    var birthday = new Date($('#birthday').val());
    var date = birthday.getDate();
    var month = birthday.getMonth() + 1;
    var year = birthday.getYear() + 1900;

    if (year == currentYear){
        if(month==currentMonth){
            if(date > currentDate){
                $('#birthday_err').html('Invalid date of birth');
                return false;
            }
        } else if(month>currentMonth){
            $('#birthday_err').html('Invalid date of birth');
            return false;
        }
    } else if(year>currentYear){
        $('#birthday_err').html('Invalid date of birth');
        return false;
    }
    $('#birthday_err').html('');
    return true;
}

function checkaddress(){
    var address = $('#address').val();
    if(address==""){
        $('#address_err').html('Required Address!');
        return false;
    }
    $('#address_err').html('');
    return true;
}

function checkphone(){
    let input = $('#phone').val();
    const regex= /^[0-9]{8,11}$/g;
    console.log(input.match(regex));
    if(!input.match(regex)){
        console.log('phone error');
        $('#phone_err').html('Invalid phone number(s)');
        return false;
    }
    document.getElementById('phone_submit').disabled=false;
    $('#phone_err').html('');
    return true;
}

function checkmail(){
    let input = $('#mail').val();
    const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!input.match(regex)){
        console.log("mail error");
        $('#mail_err').html('Invalid mail address!');
        return false;
    }
    $('#mail_err').html('');
    return true;
}

function checkwebsite(){
    let input = $('#website').val();
    const regex = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/;
    if(!input.match(regex)){
        if(input==''){
            $('#website_err').html('');
            return true;
        }
        $('#website_err').html('Invalid website address!');
        return false;
    }
    $('#website_err').html('');
    return true;
}

function checkCerDeg(){
    if($('#CerDeg').val()==''){
        $('#CerDeg_err').html('Empty space! You can not submit, please try again!');
        return false;
    }
    // alert('Successful! Please click OK');
    document.getElementById('CerDeg_submit').disabled=false;
    $('#CerDeg_err').html('');
    return true;
}

function checkProSkill() {
    return true;
}
function checkPersonalSkill() {
    return true;
}
function checkExperience (){
    return true;
}

function AddProject() {
    // Create a new input element
    var input = document.createElement("input");
    input.type = "text"; // You can change the input type as needed

    // Get the container where the input will be appended
    var container = document.getElementById("AddProSkill");

    // Append the input element to the container
    container.appendChild(input);
}
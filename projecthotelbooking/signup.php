<?php
            if(isset($_POST['register']))
            {
                //something was posted
                $username=$_POST['username'];
                $password=($_POST['Password']);
                $cpassword=($_POST['cpassword']);

                $address=$_POST['Address'];
                $age=$_POST['Age'];
                $phone=$_POST['Phone'];

                $email=$_POST['Email'];
                 

                $gender=$_POST['gender'];

                $module=$_POST['module'];
                $hash=md5($password);

                $con = mysqli_connect("localhost","root","","hotelbooking_db")or die();
                $result = mysqli_query($con,"INSERT INTO User(username,password,Age,Address,Phone_no,Email,gender,module)VALUES('$username',
                '$hash','$age','$address','$phone','$email','$gender','$module')");
                if($result)
                {
                    header('location:login.php');
                    echo "Register Sucessfully";
                }
                else{
                    echo "Fail";
                }
                
           
            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
    // Defining a function to display error message
    function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var name = document.form1.username.value;
    var password = document.form1.Password.value;
    var cpassword = document.form1.cpassword.value;
    var email = document.form1.Email.value;
    var phone = document.form1.Phone.value; 
    var gender = document.form1.gender.value;
    var age= document.form1.Age.value;
    var address=document.form1.Address.value;

	// Defining error variables with a default value
    var nameErr = emailErr = mobileErr = addErr = genderErr = ageErr = passErr =cpassErr= true;
    
    // Validate name
    if(name.trim() == "") {
        printError("nameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }

    //validate password
    //Minimum eight characters, at least one letter and one number:
    if(password.trim() == ""){
        printError("passErr","Please Enter your password");
    }else{
        var regx=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if(regx.test(password) === false){
            printError("passErr","Please Enter a valid Password.");
        }
        else{
            printError("passErr","");
            passErr = false;
        }
    }

    //for conform Password
    if(cpassword.trim()==""){
        printError("cpassErr","Please Conform your Password.");
    }else{
        if(password!=cpassword){
            printError("cpassErr","Password and Conform Password Should Match");
        }else{
            printError("cpassErr","");
            cpassErr = false;
        }

    }

    //adress validation
    if(address.trim()==""){
        printError("addErr","Please Enter your address.");
    }else{
        printError("addErr","");
        addErr=false;
    }
    // Validate email address
    if(email.trim()== "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    
    // Validate mobile number
    if(phone.trim() == "") {
        printError("mobileErr", "Please enter your mobile number");
    } else {
        var regex = /^[9]\d{9}$/;
        if(regex.test(phone) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
    
    //validate age
    if(age.trim()==""){
        printError("ageErr","Please enter your age");
    }else{
        var regx =/^(?:1[01][0-9]|120|1[7-9]|[2-9][0-9])$/;
        if(regx.test(age) === false){
            printError("ageErr","You must be of above of legal age");
        }else{
            printError("ageErr","");
            ageErr = false;
        }
    }

    // Validate gender
    if(gender.trim() == "Select") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }
   
    // Prevent the form from being submitted if there are any errors
    if((nameErr || emailErr || mobileErr || genderErr||ageErr||passErr||cpassErr ||addErr) == true) {
       return false;
    } else {
      alert("Signup successful.");
    }
};
</script>
    <title>Signup</title>
</head>
<body>
    <style type="text/css">

        .form-control{
            height: 25px;
            border-radius: 5px;
            padding:4px;
            border: solid thin #aaa;
            width:100%;
        }

        #button{
            padding: 10px;
            width: 100px;
            color: black;
            background-color:pink;
        }

        #box{
            background-color: rgb(107, 146, 170);
            margin: auto;
            width: 400px;
            padding: 20px;
        }
        
        .error{
            color: red;
        }

    </style>

    <div id="box">
        <form  name="form1" action="" method="POST"  onsubmit="return validateForm()">
            <div style="font-size: 20px; margin:10px; color:white;"> Create an account</div>
            
            <div class="form-group">
            <label for="username"><strong>User Name</strong></label> 
            <input id="txtUserName" type="text" name="username"  class="form-control"  placeholder="Enter your Full Name">
            <div class="error" id="nameErr"></div>
            </div><br>

            <div class="form-group">
            <label for="password"><strong>Password</strong></label> 
            <input id="txtPassword" type="password" name="Password"  class="form-control"  placeholder="Enter your Password">
            <div class="error" id="passErr"></div>
            </div><br>

            <div class="form-group">
            <label for="cpassword"><strong> Conform password</strong></label> 
            <input id="txtCpassword" type="password" name="cpassword"  class="form-control"  placeholder="Re-enter your Password">
            <div class="error" id="cpassErr"></div>
            </div><br>

            <div class="form-group">
            <label for="Address"><strong>Address</strong></label> 
            <input id="text" type="text" name="Address"  class="form-control" placeholder="Enter your Address">
            <div class="error" id="addErr"></div>
            </div><br>

            <div class="form-group">
            <label for="Age"><strong>Age</strong></label> 
            <input id="txtage" type="text" name="Age"  class="form-control"  placeholder="Enter your Age">
            <div class="error" id="ageErr"></div>    
            </div><br>

            <div class="form-group">
            <label for="Phone"><strong>Mobile Number</strong></label> 
            <input id="txtPhone" type="text" name="Phone"  class="form-control"  placeholder="Enter your Mobile number">
            <div class="error" id="mobileErr"></div>
            </div><br>

            <div class="form-group">
            <label for="Email"><strong>Email</strong></label> 
            <input id="txtEmail" type="text" name="Email"  class="form-control"  placeholder="Enter your Email Address">
            <div class="error" id="emailErr"></div>
            </div><br>
           
            <div class="form-group">
            <label for="Gender"><strong>Gender</strong></label> 
            <select type="text"  id="text"  name="gender" >
                <option value="Select">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Non-binary">Non-Binary</option>
                <option value="Others">Prefered not to say</option>
            </select>

        <div class="error" id="genderErr"></div>
            </div><br>
            <div class="form-group">
            <label for="Module"><strong>Module</strong></label> 
            <input id="text" type="text" name="module" value="user" readonly class="form-control" >
            </div><br>

           <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <input  id="button" type="submit" value="Signup" name = "register" onclick="validateForm()"><br><br>

            <a href="login.php">Already have an account/login </a><br><br>

        
        </form>
    </div>
</body>

</html>
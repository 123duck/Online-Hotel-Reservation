<?php
    include("connection.php");
    $id = $_GET['id'];

    $query = "SELECT * FROM user WHERE User_id = $id";

    $result = mysqli_query($con,$query);

    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['User_id'];
            $name = $row['username'];
            $address = $row['Address'];
            $age = $row['Age'];
            $phone = $row['Phone_no'];
            $email = $row['Email'];
        }
    }
    else{
        echo "error";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    // Defining a function to display error message
    function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var name = document.form1.username.value;
    var email = document.form1.Email.value;
    var phone = document.form1.Phone_no.value; 
    var age= document.form1.Age.value;
    var address=document.form1.Address.value;

	// Defining error variables with a default value
    var nameErr = emailErr = mobileErr = addErr  = ageErr = true;
    
    // Validate name
    if(name == "") {
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

    //adress validation
    if(address==""){
        printError("addErr","Please Enter your address.");
    }else{
        printError("addErr","");
        addErr=false;
    }
    // Validate email address
    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    
    // Validate mobile number
    if(phone == "") {
        printError("mobileErr", "Please enter your mobile number");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(phone) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
    
    //validate age
    if(age==""){
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
   
    // Prevent the form from being submitted if there are any errors
    if((nameErr || emailErr || mobileErr || ageErr ||addErr) == true) {
       return false;
    } else {
      
    }
};
</script>

    <title>Update User</title>
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

        .addbtn{
            display:inline-flex;
            width: calc(50% - 2px);
            margin: 0 auto;
        }

        #box{
            background-color: rgb(107, 146, 170);
            margin: auto;
            width: 400px;
            padding: 20px;
        }        
        
        .error{
            color:red;
        } 
    </style>

<div id="box">
        <form  name="form1" action="UserUpdateNew.php" method="POST" onsubmit="return validateForm()">
            <input type="hidden" name = "uid" value = "<?php echo $id;?>">


            <div style="font-size: 20px; margin:10px; color:white;"> Update </div>
            
            <div class="form-group">
            <label for="username"><strong>User Name</strong></label> 
            <input id="txtUserName" type="text" name="username"  class="form-control" value="<?php echo $name;?>" >
            <div class="error" id=nameErr></div>
            </div><br>
            <div class="form-group">
            <label for="Address"><strong>Address</strong></label> 
            <input id="text" type="text" name="Address"  class="form-control" value="<?php echo $address?>" >
            <div class="error" id=addErr></div>
            </div><br>
            <div class="form-group">
            <label for="Age"><strong>Age</strong></label> 
            <input id="txtage" type="text" name="Age"  class="form-control" value="<?php echo $age?>" >
            <div class="error" id=ageErr></div>
            </div><br>
            <div class="form-group">
            <label for="Phone"><strong>Mobile Number</strong></label> 
            <input id="txtPhone" type="text" name="Phone_no"  class="form-control" value="<?php echo $phone;?>" >
            <div class="error" id=mobileErr></div>
            </div><br>
            <div class="form-group">
            <label for="Email"><strong>Email</strong></label> 
            <input id="txtEmail" type="text" name="Email"  class="form-control" value="<?php echo $email?>" >
            <div class="error" id=emailErr></div>
            </div><br>
   
            <div class="addbtn">
            <input  id="button" type="submit" value="Update" name = "updateUser" onclick="validateForm()"><br><br>
            </div>

            <div class = "addbtn">
            <a href="ManageUser.php"><input type="button" value="User Details" id = "button"></a>
            </div>

        </form>
    </div>
</body>

</html>
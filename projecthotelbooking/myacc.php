<?php
        session_start();
        $user=$_SESSION['user'];
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
    var nameErr =  mobileErr =  true;
    
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
      
    // Prevent the form from being submitted if there are any errors
    if((nameErr ||  mobileErr) == true) {
       return false;
    } else {
      alert("Update successful.");
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

        .et_pb_button {
            display: inline-block;
            margin-right: 80px; /*space between buttons */
            padding: 9px;
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
            <div style="font-size: 20px; margin:10px; color:white;"> My account</div>

            <div class="form-group">
            <label for="username"><strong>User Name</strong></label> 
            <input id="txtUserName" type="text" name="username"  class="form-control"  placeholder="Enter your Full Name" value = "<?php echo $user['username'];?>">
            <div class="error" id="nameErr"></div>
            </div><br>

           
           
            <div class="form-group">
            <label for="Address"><strong>Address</strong></label> 
            <input id="text" type="text" name="Address"  class="form-control" placeholder="Enter your Address" value = "<?php echo $user['Address'];?>" readonly>
            <div class="error" id="addErr"></div>
            </div><br>

            <div class="form-group">
            <label for="Age"><strong>Age</strong></label> 
            <input id="txtage" type="text" name="Age"  class="form-control"  placeholder="Enter your Age" value = "<?php echo $user['Age'];?>" readonly>
            <div class="error" id="ageErr"></div>    
            </div><br>

            <div class="form-group">
            <label for="Phone"><strong>Mobile Number</strong></label> 
            <input id="txtPhone" type="text" name="Phone"  class="form-control"  placeholder="Enter your Mobile number" value = "<?php echo $user['Phone_no'];?>">
            <div class="error" id="mobileErr"></div>
            
            </div><br>
            <div class="form-group">
            <label for="Email"><strong>Email</strong></label> 
            <input id="txtEmail" type="text" name="Email"  class="form-control"  placeholder="Enter your Email Address"  value = "<?php echo $user['Email'];?>" readonly>
            <div class="error" id="emailErr"></div>
            </div><br>
           
            <input  id="button" type="submit" value="Update" name = "Updatebtn" onclick="validateForm()"><br><br>

            <a class="et_pb_button" title="Relevant Title" href="afterlogin.php">HOME</a>
            <a class="et_pb_button" title="Relevant Title" href="login.php">LOGOUT</a>

            <?php
                include("connection.php");
                if(isset($_POST['Updatebtn']))
                {
                    $user_name = $_POST['username'];
                    $user_phone = $_POST['Phone'];
                    
                    session_unset();
                    $query = 'UPDATE user SET username= "'.$user_name.'", Phone_no = "'.$user_phone.'" WHERE User_id =  '.$user['User_id'];
                    $result = mysqli_query($con,$query);
                    if($result){
                        $result=mysqli_query($con,"SELECT * FROM user where User_id =  '$user[User_id]'");
                        if($result)
                        {
                            while($row = mysqli_fetch_assoc($result)  )
                            {            
                                        
                                $_SESSION['user']=$row;                                       

                            }
                            
                        }       
                    }

                }
            ?>
        
        </form>
    </div>
</body>

</html>





























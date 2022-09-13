<?php
    include ("connection.php");
    session_start();
    if(isset($_POST['login']))
    {

        //something was posted
        $email1=$_POST['Email'];
        $password1= md5($_POST['password']);

       
            // Query to search in database
            $result=mysqli_query($con,"SELECT * FROM user");
            $result1=mysqli_query($con,"SELECT * FROM admin");

            $found_row = false;
            if($result)
            {
                while($row = mysqli_fetch_assoc($result)  )
                {
                    $email2 = $row['Email'];
                    $password2 = $row['password'];
                    $module = $row['module'];
                   

                    if($email1==$email2&&$password1==$password2)
                    {
                        if($module=="user")
                        {
                            echo "<script>";
                            echo "alert('Login Successfully')";
                            echo "</script>";

                            $_SESSION['user']=$row;
                            header('location:afterlogin.php');

                            $found_row = true;
                            break;
                        }
                
                    }          
                }
            }
            if($result1)
            {
                while($row = mysqli_fetch_assoc($result1)  )
                {
                    $email2 = $row['Email'];
                    $password2 = md5($row['password']);
                    $module = $row['module'];
                   

                    if($email1==$email2&&$password1==$password2)
                    {
                        if($module=="Admin")
                        {
                            echo "<script>";
                            echo "alert('Login Successfully')";
                            echo "</script>";

                            header('location:admindashboard1.php');
                            $found_row = true;
                            break;
                        }               
                    }          
                }
            }
            
            if($found_row==false)
            {
                echo "<script>";
                echo "alert('Invalid email or password')";
                echo "</script>";
            }               
   
     } 
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style type="text/css">

        #text{
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
            width: 300px;
            padding: 20px;
        }
        
    </style>

    <div id="box">
        <form action="" method="post">
            <div style="font-size: 20px; margin:10px; color:white;"> Login to the website </div>

            <label for="Email"><strong>Emali</strong></label>  <input id="text" type="text" name="Email"><br><br>
            

            <label for="password"><strong>Password</strong></label>  <input id="text" type="password" name="password"><br><br>

            <input  id="button" type="submit" value="Login" name ="login"><br><br>

            <a href="signup.php">Don't have  an account? Signup</a><br><br>
        </form>
    </div>
</body>
</html>
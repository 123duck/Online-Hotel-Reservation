<?php
    include ("connection.php");

    session_start();
    $user=$_SESSION['user'];
    $flag = 0;
    $rid = 0;
    $check_in = $check_out = $error1 = $error2 = '';
    $avail = '';

    if(isset($_POST['login']))
    {
        $rid = $_POST['rid'];
    }
    else{
       $rid=  $_GET['room_no'];
    }
    $query = "SELECT * FROM room Where Room_no = $rid";
    $result  = mysqli_query($con,$query);
    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
       {
        $avail = $row['Availibility'];
        if($avail=='No'||$avail=='NO')
        {
            header('location:message.php');
        }
    }
    
    }else{
        echo "error";
    }


                    include ("connection.php");
                    
                    if(isset($_POST['Book']))
                    {
                        $name = $_POST['username'];
                        $phone = $_POST['phone'];
                        $room_no = $_POST['roomno'];

                        
                        $check_in = $_POST['check_in'];
                        $check_out = $_POST['check_out'];
                        $adults = $_POST['adults'];
                        $children =$_POST['children'];
                        // $avail = $_POST['Availibility'];
                        //  $avail = "Yes";
                        $checkValid = 88;

                        $eday1 = 0;

                            if($_POST['check_in']!='')
                            {
                                $d1 = $_POST['check_in'];
                                $ey = date('Y',strtotime($d1));
                                $em = date('m',strtotime($d1));
                                $ed = date('d',strtotime($d1));

                                $eday1 = ($ey-1)*365 + ($em-1)*30 + $ed;

                                $sy = date('Y');
                                $sm = date('m');
                                $sd = date('d');

                                $sday = ($sy-1)*365 + ($sm-1)*30 + $sd;

                                $date_diff = ($sday-$eday1);


                                if($date_diff>0)
                                {
                                    $error1 = "you can not choose previous date";
                                    $checkValid = 0;
                                }
                                else{
                                    $error1 = '';
                                }
                            }
                            else
                            {
                                $error1 = "Date is required.";
                                $checkValid = 0;
                            }

                            if($_POST['check_out']!='')
                            {
                                $d2 = $_POST['check_out'];
                                $ey = date('Y',strtotime($d2));
                                $em = date('m',strtotime($d2));
                                $ed = date('d',strtotime($d2));

                                $eday2 = ($ey-1)*365 + ($em-1)*30 + $ed;

                                $date_diff = ($eday2-$eday1);
                                if($date_diff<0)
                                {
                                    $error2 = "you can not choose previous date";
                                    $checkValid = 0;
                                }
                            }
                            else
                            {
                                $error2 = "Date is required.";
                                $checkValid = 0;
                            }
                        
                    
                        if($checkValid==88)
                        {                                          
                            $query = "INSERT INTO booking(Username,Phone_no,Check_in,Check_out,Adults,Children,Room_no)VALUES('$name','$phone','$check_in','$check_out','$adults','$children','$room_no')";

                            $result = mysqli_query($con,$query);
                            if($result)
                            {
                                echo "<script>";
                                echo "alert('Room book Successful!')";
                                echo "</script>";
                                header('location:afterlogin.php');
                            }
                            else{
                                echo "<script>";
                                echo "alert('Room book unuccessful due some error!')";
                                echo "</script>";
                            }
                        }
                        
                    }
                ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .errormsg
        {
            color:red;
        }
    </style>

</head>
<body>
        <a href="afterlogin.php"><button  name ="Book" type="submit" class="btn form-btn btn-purple">Home
            <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
        </button> </a>

    <section class="booking">
        <div class="container">
            <form action="" class="form" method="POST" name="formnum" >

                <div class="input-group">
                    <label for="name" class="input-label">Full Name</label>
                    <input type="text" class="input" id="name" name="username" value="<?php echo $user['username']?>" readonly>
                </div>
                <div class="input-group">
                    <label for="name" class="input-label">Phone</label>
                    <input type="text" class="input" id="name" name="phone" value="<?php echo $user['Phone_no']?>" size = 12 readonly>
                </div>
                <div class="input-group">
                    <label for="name" class="input-label">Room No</label>
                    <input type="text" class="input" id="name" name="roomno" value="<?php echo $rid;?>" size = 5 readonly>
                </div>

                <div class="input-group">
                    <label for="check-in" class="input-label">Check in</label>
                    <input type="date" class="input" id="checkin" name="check_in"  required>
                    <div class = "errormsg"><?php echo $error1; ?> </div>
                </div>
               

                <div class="input-group">
                    <label for="check-out" class="input-label">Check out</label>
                    <input type="date" class="input" id="checkout" name="check_out"  required>
                    <div class = "errormsg"><?php echo $error2; ?></div>
                </div>
                
                <div class="input-group">
                    <label for="adults" class="input-label" name="adults">Adults</label>
                    <input type="number" class="input" id="adults" name="adults" size = 3 min=1 max=5 required>
                    
                    </div>
                    <div class="input-group">
                    <label for="children" class="input-label" name="children">Children</label>
                    <input type="number" class="input" id="children" name="children" size = 3 min=0 max=5 required>
                    
                </div>
                <br>   

                <button  name ="Book" type="submit" class="btn form-btn btn-purple" >Book
                    <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
                </button>


                            </form>
        </div>
    </section>  
</body>
</html>

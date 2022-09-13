<?php
    include ("connection.php");

    $rid = $_GET['rid'];

    $result = mysqli_query($con, "SELECT * FROM room WHERE Room_id = '$rid'");
            
    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $rid = $row['Room_id'];
            $room_type = $row['Room_type'];
            $room_no  = $row['Room_no'];
            $availibility= $row['Availibility'];
            $price = $row['Price'];
            $image = $row['images'];
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Add Room</title>
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
			/* margin-right:98px; */
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
        <form  name="form1" action="RoomNewUpdate.php" method="POST" enctype = "multipart/form-data">

            <div style="font-size: 30px; margin:10px; color:white; text-align:center;" > Update Room </div>
            
            <input type="hidden" name="rid" value="<?php echo $rid;?>">
            <div class="form-group">
            <label for="username"><strong>Room Type</strong></label> 
            <input id="txtUserName" type="text" name="roomtype"  class="form-control" value="<?php echo $room_type;?>">
            
			</div><br>
            <div class="form-group">
            <label for="Address"><strong>Room No</strong></label> 
            <input id="text" type="text" name="roomno"  class="form-control" value="<?php echo $room_no;?>">
           
            </div><br>
            <div class="form-group">
            <label for="Age"><strong>Availibility</strong></label> 
            <input id="txtage" type="text" name="availibility"  class="form-control" value="<?php echo $availibility;?>">
            
            </div><br>
            <div class="form-group">
            <label for="Phone"><strong>Price</strong></label> 
            <input id="txtPhone" type="text" name="price"  class="form-control" value="<?php echo $price;?>">
            
            </div><br>
            <div class="form-group">
            <label for="Email"><strong>Image</strong></label><br><br> 
            <img src="<?php echo $image;?>" alt="" height="100" width="100"><br><br>
            <input id="txtEmail" type="file" name="new_image"  class="form-control">
            <input id="txtEmail" type="hidden" name="old_image"  class="form-control" value="<?php echo $image;?>">
            
            </div><br>
   
            <div class="addbtn">
            <input  id="button" type="submit" value="Update" name = "updateroombtn"><br><br>
            </div>

            <div class = "addbtn">
            <a href="manageroom.php"><input type="button" value="Room Details" id = "button"></a>
            </div>

        </form>
    </div>
</body>

</html>
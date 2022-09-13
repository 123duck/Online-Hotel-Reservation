<?php
    include("connection.php");
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
        <form  name="form1" action="" method="POST" enctype = "multipart/form-data">

            <div style="font-size: 30px; margin:10px; color:white; text-align:center;"> Add Room </div>
            
            <div class="form-group">
            <label for="username"><strong>Room Type</strong></label> 
            <input id="txtUserName" type="text" name="roomtype"  class="form-control"  required>
            
			</div><br>
            <div class="form-group">
            <label for="Address"><strong>Room No</strong></label> 
            <input id="text" type="text" name="roomno"  class="form-control" required>
           
            </div><br>
            <div class="form-group">
            <label for="Age"><strong>Availibility</strong></label> 
            <input id="txtage" type="text" name="availibility"  class="form-control" required>
            
            </div><br>
            <div class="form-group">
            <label for="Phone"><strong>Price</strong></label> 
            <input id="txtPhone" type="text" name="price"  class="form-control" required>
            
            </div><br>
            <div class="form-group">
            <label for="Email"><strong>Image</strong></label> 
            <input id="txtEmail" type="file" name="uploadfile"  class="form-control" required>
            
            </div><br>

            <div class="form-group">
            <label for="offer"><strong>Offer</strong></label> 
            <input id="txtPhone" type="text" name="offer"  class="form-control" required>
            
            </div><br>
   
            <div class="addbtn">
            <input  id="button" type="submit" value="Add" name = "addroombtn"><br><br>
            </div>

            <div class = "addbtn">
            <a href="manageroom.php"><input type="button" value="Room Details" id = "button"></a>
            </div>

			<?php
				if(isset($_POST['addroombtn']))
				{
					$room_type = $_POST['roomtype'];
					$room_no = $_POST['roomno'];
					$availibility = $_POST['availibility'];
					$price = $_POST['price'];
					$offer = $_POST['offer'];
					
					//for file
					$filename = $_FILES['uploadfile']['name'];
					$tempname = $_FILES['uploadfile']['tmp_name'];

					$folder = "uploadroom/".$filename;
					move_uploaded_file($tempname, $folder);

					$query = "INSERT INTO room (Room_type,Room_no,Availibility,Price,images,offer) VALUES ('$room_type','$room_no','$availibility', '$price','$folder','$offer')";
					$result = mysqli_query($con,$query);

					if($result)
					{
						echo "<script>";
							echo "alert('Room added Successfully')";
						echo "</script>";
					}
					else{
						echo "<script>";
							echo "alert('Something wrong!')";
						echo "</script>";
					}
				}

			?>

        </form>
    </div>
</body>

</html>

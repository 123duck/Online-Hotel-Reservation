<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        #button{
            padding:12px 16px;
            font-size:20px;
            color:white;
            background-color: blue;
            border:none;
            border-radius: 2px;
            margin-bottom: 15px;
        }
        .header
        {
            padding:30px;
            background-color: pink;
            margin-bottom: 15px;
        }
        .header h1
        {
            text-align: center;
        }
        th, td
        {
            padding:10px;
        }
    </style>
</head>
<body>
    <div class="header">

        <h1>Room Details</h1>
    </div> 
    <div class = "addbtn">
        <a href="AddRoom.php"><input type="button" value="Add Room" id = "button"></a> 
    </div>

    <div class = "table">
        <?php
            include ("connection.php");

            $result = mysqli_query($con, "SELECT * FROM room");
            $sn = 0;
            
            echo "<table border='1' cellspacing='0'>";
                    echo "<tr>
                            <th>SN</th>
                            <th>Room Type</th>
                            <th>Room No</th>
                            <th>Availibility</th>
                            <th>Price</th>
                            <th>images</th>
                            <th>Offer</th>
                            <th colspan='2'>Actions</th>
                        </tr>";
                    

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $sn = $sn + 1;

                        echo "<tr>
                                  <td> ".$sn."</td>
                                  <td> ".$row['Room_type']."</td>
                                  <td> ".$row['Room_no']."</td>
                                  <td> ".$row['Availibility']."</td>
                                  <td> ".$row['Price']."</td>
                                  <td><img src = '".$row['images']."' height='100' width='100'></td>
                                  <td> ".$row['offer']."</td>
                                  
                                  <td><a href='RoomUpdate.php?rid=$row[Room_id]'> Edit </a></td>
                                  <td><a href='RoomDelete.php?rid=$row[Room_id]'> Delete </a></td>

                                </tr>";
                    } 
         ?>
</table><br>
<div class = "addbtn">
        <a href="admindashboard1.php"><input type="button" value="Dashboard" id = "button"></a>
          
    </div>
    </div>
</body>
</html>